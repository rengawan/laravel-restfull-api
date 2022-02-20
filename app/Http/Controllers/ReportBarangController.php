<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\mutasi;


class ReportBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //
     
    }

    
    function reportStock(Request $request)
    {
        if (!\AppHelper::instance()->getpermision(5,"R"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }

        $periode_start=date("Y-m-d");
        $periode_end=date("Y-m-d");
        
        $validated = $request->validate([
            'tanggal_mulai' => 'date',
            'tanggal_akhir' => 'date',
        ]);

        if ($request->filter=="daily")
        {
                $periode_start=date("Y-m-d");
                $periode_end=date("Y-m-d");
        }
        elseif ($request->filter=="weekly")
        {
            $day = date('w');
            $periode_start=date("Y-m-d",strtotime('-'.$day.' days'));
            $periode_end=date("Y-m-d",strtotime('+'.(6-$day).' days'));
        }
        elseif ($request->filter=="monthly")
        {
            $periode_start=date("Y-m-01");
            $periode_end=date("Y-m-t");  
        }
        elseif ($request->filter=="yearly")
        {
            $periode_start=date("Y-01-01");
            $periode_end=date("Y-12-31");  
        }
        elseif ($request->filter=="periode")
        {
            $periode_start=$request->tanggal_mulai;
            $periode_end=$request->tanggal_akhir;  
        }

        
        return $this->resStock($periode_start,$periode_end);
    }

    function resStock($periode_start,$periode_end)
    {
        $strSQL="
                select barang_kode,barang_nama,kategori_nama,coalesce(saldo_awal,0) saldo_awal,coalesce(mutasi_masuk,0) mutasi_masuk,coalesce(mutasi_keluar,0) mutasi_keluar,coalesce(saldo_awal,0) + coalesce(mutasi_masuk,0) - coalesce(mutasi_keluar,0) saldo_akhir from barang 
            inner join kategori on kategori.id=barang.kategori_id
            left join
            (
            select barang_id,
            sum(case when  type='Mutasi Masuk' then kuantitas else -kuantitas  end) saldo_awal
            from mutasi where tanggal < '".$periode_start."'
            group by barang_id
            ) saldo on saldo.barang_id=barang.id
            left join
            (
            select barang_id,
            sum(case when  type='Mutasi Masuk' then kuantitas end) mutasi_masuk,
            sum(case when  type='Mutasi Keluar' then kuantitas end) mutasi_Keluar
            from mutasi where tanggal between '".$periode_start."' and '".$periode_end."'
            group by barang_id
            ) mutasi on mutasi.barang_id=barang.id
        ";
        $results = DB::select($strSQL);

        return response()->json($results, 200);
    }
}

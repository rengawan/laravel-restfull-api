<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\mutasi;


class ReportBarangKeluarController extends Controller
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

    
    function reportBarangKeluar(Request $request)
    {
        if (!\AppHelper::instance()->getpermision(7,"R"))
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

        
        return $this->resBarangKeluar($periode_start,$periode_end);
    }

    function resBarangKeluar($periode_start,$periode_end)
    {
        $strSQL="
        select mutasi.id,barang_kode,barang_nama,kategori_nama,tanggal,kuantitas,barang_satuan from mutasi 
        inner join barang on barang.id=mutasi.barang_id
        inner join kategori on kategori.id=barang.kategori_id
        where type='Mutasi Keluar' and tanggal between '".$periode_start."' and '".$periode_end."'
        order by mutasi.id
        ";
        $results = DB::select($strSQL);
        return response()->json($results, 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Barang;


class BarangController extends Controller
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
        if (!\AppHelper::instance()->getpermision(2,"R"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }
       
        return response()->json(Barang::all(),200);
    }

    public function search($kriteria)
    {
        //
        if (!\AppHelper::instance()->getpermision(2,"R"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }
        
        $result=Barang::where("barang_kode",'like',"%$kriteria%")->orWhere("barang_nama",'like',"%$kriteria%")->get();
        
        
        
        if ($result->count()==0)
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        return response()->json($result,200);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //
            if (!\AppHelper::instance()->getpermision(2,"C"))
            {
                return response()->json(['error' => 'Permision Denied'], 403);
            }

            $validated = $request->validate([
                'barang_kode' => 'required|unique:barang|max:255',
                'kategori_id' => 'required|integer',
                'barang_nama' => 'required',
                'barang_satuan' => 'required',
            ]);

            try {
            $barang = Barang::create($request->all());
           } catch (\Illuminate\Database\QueryException $e) 
           {
               return response()->json(['error' => $e->getMessage()], 500);
           }

        
        return response()->json($barang, 201);
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!\AppHelper::instance()->getpermision(2,"R"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }

        //
        try { 
        $data= Barang::where('id',$id)->with('kategori')->firstOrFail();;
        } catch (\Illuminate\Database\QueryException $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }    


        return response()->json($data,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!\AppHelper::instance()->getpermision(2,"U"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }

        //
        $validated = $request->validate([
            'kategori_id' => 'required|integer',
            'barang_nama' => 'required',
            'barang_satuan' => 'required',
        ]);
        try {
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        } catch (\Illuminate\Database\QueryException $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        return response()->json($barang, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!\AppHelper::instance()->getpermision(2,"D"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }

        try {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        } catch (\Illuminate\Database\QueryException $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        return response()->json($barang, 204);
    }
}

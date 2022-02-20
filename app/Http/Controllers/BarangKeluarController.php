<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\mutasi;


class BarangKeluarController extends Controller
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

        if (!\AppHelper::instance()->getpermision(4,"R"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }

        $data=Mutasi::where('type','Mutasi Keluar')->get();
        return response()->json($data,200);
    }

    public function getDataByUser()
    {
        //

        if (!\AppHelper::instance()->getpermision(4,"R"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }

        $data=Mutasi::where('type','Mutasi Keluar')->where('created_by',auth()->id())->get();
        return response()->json($data,200);
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
        
            if (!\AppHelper::instance()->getpermision(4,"C"))
            {
                return response()->json(['error' => 'Permision Denied'], 403);
            }

            $validated = $request->validate([
                'tanggal' => 'required|date',
                'barang_id' => 'required|integer',
                'kuantitas' => 'required|integer',
            ]);
            try 
            {
        //    echo $request->tanggal;
            
            $mutasi = new Mutasi;
            $mutasi->tanggal=$request->input('tanggal');
            $mutasi->type="Mutasi Keluar";
            $mutasi->barang_id=$request->input('barang_id');
            $mutasi->kuantitas=$request->input('kuantitas');
            $mutasi->created_by=auth()->id();
            $mutasi->save();
           } catch (\Illuminate\Database\QueryException $e) 
           {
               return response()->json(['error' => $e->getMessage()], 500);
           }
        return response()->json($mutasi, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        if (!\AppHelper::instance()->getpermision(4,"R"))
            {
                return response()->json(['error' => 'Permision Denied'], 403);
            }
        try {
        $data= Mutasi::findOrFail($id);
        if ($data->type<>"Mutasi Keluar")
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }

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
        //

        if (!\AppHelper::instance()->getpermision(4,"U"))
            {
                return response()->json(['error' => 'Permision Denied'], 403);
            }

        $validated = $request->validate([
            'tanggal' => 'date',
            'barang_id' => 'integer',
            'kuantitas' => 'integer',
        ]);

        try {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->updated_by=auth()->id();
        if ($mutasi->type<>"Mutasi Keluar")
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }

        $mutasi->update($request->all());
        } catch (\Illuminate\Database\QueryException $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        return response()->json($mutasi, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!\AppHelper::instance()->getpermision(4,"D"))
            {
                return response()->json(['error' => 'Permision Denied'], 403);
            }

        try {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->delete();
        } catch (\Illuminate\Database\QueryException $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        return response()->json($mutasi, 204);
    }
}

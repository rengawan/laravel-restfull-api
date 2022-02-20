<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Kategori;


class kategoriController extends Controller
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
        if (!\AppHelper::instance()->getpermision(1,"R"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }
        return response()->json(Kategori::all(),200);
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
            if (!\AppHelper::instance()->getpermision(1,"C"))
            {
                return response()->json(['error' => 'Permision Denied'], 403);
            }

            $validated = $request->validate([
                'kategori_nama' => 'required|unique:kategori|max:255',
                'kategori_keterangan' => '',
            ]);

            try 
            {
            $kategori = Kategori::create($request->all());
           } catch (\Illuminate\Database\QueryException $e) 
           {
               return response()->json(['error' => $e->getMessage()], 500);
           }

        
        return response()->json($kategori, 201);
        
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

        if (!\AppHelper::instance()->getpermision(1,"R"))
            {
                return response()->json(['error' => 'Permision Denied'], 403);
            }

    try {     
        $data= Kategori::findOrFail($id);
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
        
        if (!\AppHelper::instance()->getpermision(1,"U"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }


        //
        $validated = $request->validate([
            'kategori_nama' => 'required|max:255',
            'kategori_keterangan' => '',
        ]);

        try {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        } catch (\Illuminate\Database\QueryException $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        return response()->json($kategori, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!\AppHelper::instance()->getpermision(1,"D"))
        {
            return response()->json(['error' => 'Permision Denied'], 403);
        }

        try {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        } catch (\Illuminate\Database\QueryException $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        return response()->json($kategori, 204);
    }
}

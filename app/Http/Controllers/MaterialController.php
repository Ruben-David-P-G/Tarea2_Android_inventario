<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use Exception;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Material::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Validate request...
         try{
            $material = new Material();
            $material->season = $request->season ;
            $material->code = $request->code;
            $material->line = $request->line;
            $material->description = $request->description ;
            $material->unit = $request->unit;
            $material->stock = $request->stock;
            $material->save();
            return response('Material creado', 201);
        }catch(Exception $e){
            return response('Material no creado', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);
        if($material){
            return $material;
        }
        return response('Material Not found', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        try{
            $material = Material::find($id);
            $material->season = $request->season ;
            $material->code = $request->code;
            $material->line = $request->line;
            $material->description = $request->description ;
            $material->unit = $request->unit;
            $material->stock = $request->stock;
            $material->save();

            return response('Material modified', 200);
        }catch(Exception $e){
            return response('Error Updating Material', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Material::find($id)->delete();
    }
}

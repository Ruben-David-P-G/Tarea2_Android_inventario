<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producer;
use Exception;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producer::all();
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
            $producer = new Producer();
            $producer->contract = $request->contract ;
            $producer->name = $request->name;
            $producer->season = $request->season;
            $producer->save();
            return response('Producer created', 201);
        }catch(Exception $e){
            return response('Producer not created', 400);
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
        $producer = Producer::find($id);
        if($producer){
            return $producer;
        }
        return response('Producer Not found', 404);
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
        //Validate request...
        try{
            $producer = Producer::find($id);
            $producer->contract = $request->contract ;
            $producer->name = $request->name;
            $producer->season = $request->season;
            $producer->save();
            return response('Producer modified', 200);
        }catch(Exception $e){
            return response('Error Updating producer', 400);
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
        return Producer::find($id)->delete();
    }
}

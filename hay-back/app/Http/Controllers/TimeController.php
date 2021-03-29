<?php

namespace App\Http\Controllers;
use App\Time;
use App\Http\Requests\TimeRequest;

use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time = Time::all();
        if($time){
            return response()->json([
                'time' => $time
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t fetch data'
        ],401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeRequest $request)
    {
        $data = $request->all();
        $time = new Time;
        $time->fill($data);
        $time->save();
        if($time){
            return response()->json([
                'time' => $time
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t store data'
        ],401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeRequest $request, $id)
    {
        $data = $request->all();
        $time = Time::where('id' , $id)->first();
        $time->update($data);
        $time->save();
        if($time){
            return response()->json([
                'time' => $time
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t update data'
        ],401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Time::where('id' , $id)->delete();
        if($time){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}

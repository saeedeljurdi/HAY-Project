<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group_therapy;
use App\Http\Requests\TherapyRequest;


class GroupTherapyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $therapy = Group_therapy::with('session')->get();
        if($therapy){
            return response()->json([
                'therapy' => $therapy
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
    public function store(TherapyRequest $request)
    {
        $data = $request->all();
        $therapy = new Group_therapy;
        $therapy->fill($data);
        if($data['image'] === "empty"){
            unset($data['image']);
       }else{
           $therapy->image = custom_image($request);
       }
        $therapy->save();
        if($therapy){
            return response()->json([
                'therapy' => $therapy
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
    public function update(TherapyRequest $request, $id)
    {
        $data = $request->all();
        $therapy = Group_therapy::where('id' , $id)->first();
        if($data['image'] === "empty"){
            unset($data['image']);
            $therapy->update($data);
       }else{
           $therapy->update($data);
           $therapy->image = custom_image($request);
       }
        $therapy->save();
        if($therapy){
            return response()->json([
                'therapy' => $therapy
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
        $therapy = Group_therapy::where('id' , $id)->delete();
        if($therapy){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}

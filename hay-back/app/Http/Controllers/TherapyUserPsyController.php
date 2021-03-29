<?php

namespace App\Http\Controllers;
use App\Http\Requests\SessionRequest;


use Illuminate\Http\Request;
use App\Therapy_user_psychologist;


class TherapyUserPsyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $session = Therapy_user_psychologist::with('psychologist','time','user','usersession')->get();
        if($session){
            return response()->json([
                'session' => $session
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

    public function store(SessionRequest $request)
    {
        $data = $request->all();
        $session = new Therapy_user_psychologist;
        $session->fill($data);
       
        if($data['image'] === "empty"){
            unset($data['image']);
       }else{
           $session->image = custom_image($request);
       }
        $session->save();
        if($session){
            return response()->json([
                'session' => $session
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
  
    public function update(SessionRequest $request, $id)
    {
        $data = $request->all();
        $session = Therapy_user_psychologist::where('id' , $id)->first();
        
        if($data['psychologist_id'] === null){
            unset($data['psychologist_id']);
        }
        if($data['image'] === "empty"){
        $session->update($data);
        unset($data['image']);
       }else{
        $session->update($data);

        $session->image = custom_image($request);
       }
        $session->save();
        if($session){
            return response()->json([
                'session' => $session
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
        $session = Therapy_user_psychologist::where('id' , $id)->delete();
        if($session){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
} 
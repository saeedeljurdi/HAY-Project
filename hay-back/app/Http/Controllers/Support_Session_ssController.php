<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Support_session_ss;

use App\Helpers\Helpers;

use App\Http\Requests\SessionRequestSS ;

class Support_Session_ssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supportSession = Support_session_ss::with('support_group' ,'psychologist' , 'time_ss' , 'user')->get();
        return $supportSession;
        return response()->json($supportSession);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SessionRequestSS   $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequestSS  $request)
    {
        $data = $request->all();
        $supportSession = new Support_session_ss;
        $supportSession->fill($data);

        if($data['image'] === "null"){
            unset($data['image']);
       }else{
           $supportSession->image = custom_image($request);
       }

        $supportSession->save();
        return response()->json([
            'status' => 200,
            'supportSession' => $supportSession
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SessionRequestSS   $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionRequestSS  $request, $id)
    {
        $data = $request->all(); 
        $supportSession = Support_session_ss::where('id' , $id)->first();      
        if($data['image'] === "empty"){
             unset($data['image']);
             $supportSession->update($data);
        }else{
            $supportSession->update($data);
            $supportSession->image = custom_image($request);
        }
       
        if($data['psychologist_id'] === null){
            unset($data['psychologist_id']);
        }
        
         $supportSession->save();
         
         return response()->json('Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Support_session_ss::where('id' , $id)->delete();
    }
}

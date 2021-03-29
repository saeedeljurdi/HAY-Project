<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Support_Group;

use App\Helpers\Helpers;

use App\Http\Requests\TherapyRequest;


class SupportGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supportGroup = Support_Group::with('supportSession')->get();
        return $supportGroup;
        return response()->json($supportGroup);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TherapyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TherapyRequest $request)
    {
        $data = $request->all();
        $supportGroup = new Support_Group;
        $supportGroup->fill($data);

        if($data['image'] === "null"){
            unset($data['image']);
       }else{
           $supportGroup->image = custom_image($request);
       }

        $supportGroup->save();
        return response()->json([
            'status' => 200,
            'SupportGroup' => $supportGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TherapyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TherapyRequest  $request, $id)
    {
        $data = $request->all(); 
        $supportGroup = Support_Group::where('id' , $id)->first();      
        if($data['image'] === "empty"){
             unset($data['image']);
             $supportGroup->update($data);
        }else{
            $supportGroup->update($data);
            $supportGroup->image = custom_image($request);
        }
        
         $supportGroup->save();
         
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
        Support_Group::where('id' , $id)->delete();
    }
}

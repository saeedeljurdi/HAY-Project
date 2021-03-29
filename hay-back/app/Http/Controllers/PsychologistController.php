<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PsychologistRequest;
use App\Psychologist;

class PsychologistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psychologist = Psychologist::all();
        if($psychologist){
            return response()->json([
                'psychologist' => $psychologist
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
    public function store(PsychologistRequest $request)
    {
        $data = $request->all();
        $psychologist = new Psychologist;
        $psychologist->fill($data);

        if($data['image'] === "empty"){
            unset($data['image']);
       }else{
           $psychologist->image = custom_image($request);
       }
        $psychologist->save();
        if($psychologist){
            return response()->json([
                'psychologist' => $psychologist
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
    public function update(PsychologistRequest $request, $id)
    {
        $data = $request->all();
        $psychologist = Psychologist::where('id' , $id)->first();
        if($data['image'] === "empty"){
            unset($data['image']);
            $psychologist->update($data);
       }else{
           $psychologist->update($data);
           $psychologist->image = custom_image($request);
       }
        $psychologist->save();
        if($psychologist){
            return response()->json([
                'psychologist' => $psychologist
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
        $psychologist = Psychologist::where('id' , $id)->delete();
        if($psychologist){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Time_ss;

class TimeSSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeSS = Time_ss::All();
        if($timeSS){
            return response()->json([
                'time' => $timeSS
            ] , 200);
        }
        return response()->json(['message' => 'error time'] , 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $timeSS = new Time_ss;
        $timeSS->fill($data);
        $timeSS->save();
        return response()->json([
            'status' => 200,
            'timeSS' => $timeSS
        ]);
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
        $data = $request->all(); 
        $timeSS = Time_ss::where('id' , $id)->first();      
        $timeSS->save();
         
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
        Time_ss::where('id' , $id)->delete();
    }
}

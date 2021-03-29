<?php

namespace App\Http\Controllers;
use App\Home;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::all();
         if($home){
             return response()->json([
                 'home' => $home
             ],200);
         }
         return response()->json([
             'message' => 'couldn\'t fetch data'
         ],401);
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
    public function store(HomeRequest $request)
    { 
        $data = $request->all();
        $home = new Home();
        $home->fill($data);
        $home->save();
        return response()->json([
            'home' => $home,
             'status' => 200
        ]);
    
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomeRequest $request, $id)
    {
        $data = $request->all();  //dd is to dump and die to print
        $home = Home::where('id' , $id)->first();
        $home->update($data);
        $home->save();

            return response()->json([
                'message'=> 'Home was succesfully updated!'
            ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home = Home::where('id' , $id)->delete();
     
            if($home){
                return response()->json([
                    'message' => 'Success'
                ]);
            }
            return response()->json([
                'message' => 'couldn\'t delete data'
            ]);
        }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdmin;

use App\Helpers\Helpers;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $admins = Admin::All();
          return $admins;
          return response()->json($admins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @return \Illuminate\Http\AdminResponse
     */
    public function store(AdminRequest $request)
    {
      
        
        $data = $request->all();
        $admins = new Admin();
        $admins->fill($data);

        if($data['image'] === "null"){
            unset($data['image']);
       }else{
           $admins->image = custom_image($request);
       }

        $admins->save();
        return response()->json([
            'status' => 200,
            'admins' => $admins
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateAdmin  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin $request, $id)
    {
        $data = $request->all(); 
        $admins = Admin::where('id' , $id)->first();      
        if($data['image'] === "empty"){
             unset($data['image']);
             $admins->update($data);
        }else{
            $admins->update($data);
            $admins->image = custom_image($request);
        }
        
         $admins->save();
         
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
        Admin::where('id' , $id)->delete();
    }
}

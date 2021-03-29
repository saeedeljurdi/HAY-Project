<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUserRequest;


class UserUpdateInfo extends Controller
{


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();  //dd is to dump and die to print
        $user = User::where('id' , $id)->first();       
        if($data['image'] === "empty"){
            unset($data['image']);
            $user->update($data);
       }else{
           $user->update($data);
           $user->image = custom_image($request);
       }
         $user->save();
         
         return response()->json('Successfully updated');
     
    }

}
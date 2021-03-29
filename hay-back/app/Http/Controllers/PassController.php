<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\PasswordUpRequest;


use Illuminate\Http\Request;

class PassController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordUpRequest $request, $id)
    {
        
        $data = $request->all();
        $user = User::where('id' , $id)->first();
        $user->password = $data['password'];
        $user->update($data);
        $user->save();
        if($user){
            return response()->json([
                'user' => $user
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t update data'
        ],401);
    
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\ChangePassword;



class AdminAuthController extends Controller
{
    /**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @return \Illuminate\Http\AdminResponse
     */


  
    public function register(AdminRequest $request)
    {
        $admin = $request->all();
        if($request->image)
        {
        $admins->image = custom_image($request);
        }
        Admin::create($admin);
        
        return response()->json('Successfully added');
       
    }

    /**
     * Login to an existing resource in storage.
     *
     * @return \Illuminate\Http\AdminLoginRequest
     */
    public function login(Request $request)
    {
        $credentials = request(['username', 'password']);

        if (! $token = auth('admin')->attempt($credentials)) {
            return response()->json(['error' => $this->respondWithToken($token)], 401);
        }else{
           return $this->respondWithToken($token);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Admin Successfully logged out']);
    }

    /**
     * Update Password for each Admin 
     *
     * @param  int  $id
     * @param  \Illuminate\Http\ChangePassword  $request
     * @return \Illuminate\Http\Response
    */

    public function updatePassword(ChangePassword $request , $id){
        $data = $request->all();
        $adminsUpdatePass = Admin::where('id' , $id)->first();
        $adminsUpdatePass->password = $data['password'];
        $adminsUpdatePass->update($data);
   
        return response()->json('Password successfully updated');
    }




     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function respondWithToken($token)
    {
        $admin = auth('admin')->user();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL()*60,
            'admin' => $admin,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\LoginUserRequest;




class UserController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('support_session , time_ss')->get();
        return response()->json($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function callbackUser()
    {
        $users = User::all();
        return response($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AddUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(AddUserRequest $request)
    {  
        $user = $request->all();
        if($request->image)
       {
           $image = $request->image;
           $name = time().'_' . $image->getClientOriginalName();
           $filePath = $request->file('image')->storeAs('', $name, 'public');
           $user['image'] = $name;  
        }
        User::create($user);
        
        return response()->json('Successfully added');
    }
  
     /**
     * select from a list of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['errors' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

     /**
     * select from a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

       /**
     * removing token from a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function respondWithToken($token)
    {
        $user= auth()->user();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60*24*7,
            'user' => $user,
        ]);
    }

    
}
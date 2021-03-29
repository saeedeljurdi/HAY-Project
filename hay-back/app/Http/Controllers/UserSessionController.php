<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserSessionRequest;

use Illuminate\Http\Request;
use App\UserSession;


class UserSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersession = UserSession::with('user','time' , 'session')->get();
        if($usersession){
            return response()->json([
                'usersession' => $usersession
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
    public function store(Request $request)
    {
        $data = $request->all();
        $usersession = new UserSession;
        $usersession->fill($data);
        $usersession->save();
        if($usersession){
            return response()->json([
                'usersession' => $usersession
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t store data'
        ],401);
    }

    public function destroy($id)
    {
        $usersession = UserSession::where('id' , $id)->delete();
        if($usersession){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }

}

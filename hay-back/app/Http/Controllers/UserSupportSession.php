<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ UserSupportGroupS ;

class UserSupportSession extends Controller
{


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userSupportSession = UserSupportGroupS::with('time', 'user' , 'session')->get();
        return $userSupportSession;
        return response()->json($userSupportSession);
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
        $userSupportSession = new UserSupportGroupS();
        $userSupportSession->fill($data);
        $userSupportSession->save();
        return response()->json([
            'status' => 200,
            'userSupportSession' => $userSupportSession
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
        UserSupportGroupS::where('id' , $id)->delete();
        return response()->json('Deleted');
    }
}

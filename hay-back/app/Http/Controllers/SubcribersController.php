<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Subscriber;
use App\Http\Requests\Subscribe;

class SubcribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::all();
        return response($subscribers);
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
     * @param  \Illuminate\Http\Subscribe  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subscribe $request)
    {
        $request->validated();
        $newSubscriber = new Subscriber();
        $newSubscriber->email = $request->email;
        $newSubscriber->save();
        return response()->json(["Message" => "You are now subscribed !"],200);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newSubscriber = Subscriber::findOrFail($id);
        $newSubscriber->delete();
        return response("Subscriber deleted successfully !!");
    }
}

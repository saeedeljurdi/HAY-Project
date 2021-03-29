<?php

namespace App\Http\Controllers;

use App\UserEvent;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $data = $request->all();
        $userEvent = new UserEvent();
        $userEvent->fill($data);
        $userEvent->save();
        if($userEvent->save())
        {
            return response()->json([
                'status' => 200,
                'message' => 'successfully added',
                'data' => $userEvent,
            ]);
        }
        else{
            return response()->json([
            'message' => 'Failed to add'
        ]);}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserEvent  $userEvent
     * @return \Illuminate\Http\Response
     */
    public function show(UserEvent $userEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserEvent  $userEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(UserEvent $userEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserEvent  $userEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserEvent $userEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserEvent  $userEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserEvent $userEvent)
    {
        //
    }
}

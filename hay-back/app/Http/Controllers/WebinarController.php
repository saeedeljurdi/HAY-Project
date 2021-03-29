<?php

namespace App\Http\Controllers;

use App\Webinar;
use App\Http\Requests\AddWebinarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinar =  Webinar::with('user')->get();
        return response()->json($webinar);
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddWebinarRequest $request)
    {
        $data = $request->all();
        $webinar = new Webinar();
        $webinar->fill($data);
        $image = $request->file('image');
        if($image)
        {
            $path = Storage::disk('public')->put('images', $image);
            $webinar->image = $path;
        }

        $webinar->save();

        return response()->json([
            'status' => 200,
            'webinar' => $webinar,
        ]);  
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\webinars  $webinars
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $webinar =  Webinar::where('id', $id)->first();
        return response()->json($webinar);
        
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Webinar  $Webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $webinar = Webinar::findOrFail($id);        
        $previousImage = $webinar->image;
        $image = $request->file('image');
        if($image)
        {
            $path = Storage::disk('public')->put('images', $image);
            $data['image'] = $path;
            if($path){
            Storage::disk('public')->delete('/' . $previousImage);
            }
        } else 
        {
            $webinar->image = $previousImage;
        }
        $webinar->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Webinar was updated successfully',
            'webinar' => $webinar,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Webinar  $Webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webinar = Webinar::findOrFail($id);
        $image = $webinar->image;
        Storage::disk('public')->delete('/' .$image);
        $webinar->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Webinar has been deleted successfully',
        ]);
    }
}

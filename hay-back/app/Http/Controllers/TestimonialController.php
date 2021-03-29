<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\AddTestimonialRequest;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial =  Testimonial::all();
        return response()->json($testimonial);        
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTestimonialRequest $request)
    {           
        $data = $request->all();
        $testimonial = new Testimonial();
        $testimonial->fill($data);
        $image = $request->file('image');
        if($image)
        {
            $path = Storage::disk('public')->put('images', $image);
            $testimonial->image = $path;
        }
        else{
            $testimonial->image = 'null';
        }

        $testimonial->save();

        return response()->json([
            'status' => 200,
            'testimonial' => $testimonial,
        ]);  

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial =  Testimonial::where('id', $id)->first();
        return response()->json($testimonial);
    }


   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $testimonial = Testimonial::findOrFail($id);
        $previousImage = $testimonial->image;
        $image = $request->file('image');
        if($image)
        {
            $path = Storage::disk('public')->put('images', $image);
            $data['image'] = $path;
            if($path)
            {
            Storage::disk('public')->delete('/' . $previousImage);
            }
        } else 
        {
            $testimonial->image = $previousImage;
        }
        $testimonial->update($data);


        return response()->json([
            'status' => 200,
            'message' => 'Testimonial is successfully updated ',
            'testimonial' => $testimonial,
        ]);       
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $image = $testimonial->image;
        Storage::disk('public')->delete('/' .$image);
        $testimonial->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Testimonial has been deleted successfully',
        ]);
    }
}

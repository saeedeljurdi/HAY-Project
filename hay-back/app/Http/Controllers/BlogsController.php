<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddBlog;
use App\Http\Requests\UpdateBlogs;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
       return response($blogs);
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
     * @param  \Illuminate\Http\AddBlog  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBlog $request)
    {
        $data=$request->all();
        $request->validated();
        $newBlogs = new Blog();
        $newBlogs->fill($data);
        $path = "";
        if(request('image')) {
            $path = Storage::disk('public')->put('',request('image'));            
        }
        if($path != "") {
            $newBlogs->image = $path;
        }else {
            $newBlogs->image = request('image');
        }
        $newBlogs->save();
        return response("Blog added successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Blog::where('id',$id)->first();
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
     * @param  \Illuminate\Http\UpdateBlogs  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogs $request, $id)
    {
        $data = $request->all(); 
         $newBlogs = Blog::where('id' , $id)->first();      
        if($data['image'] === "empty"){
             unset($data['image']);
             $newBlogs->update($data);
        }else{
            $image = $request->image;
            $name = time().'_' . $image->getClientOriginalName();
            $filePath = $request->file('public')->storeAs('', $name, 'public');
            $newBlogs['image'] = $name;  
            $newBlogs->image = $name;
            $newBlogs->update($data);
        }
        
         $newBlogs->save();
         
         return response()->json('Successfully updated');
    }
    
    // public function update(UpdateBlogs $request, $id)
    // {
    //     $newBlogs = Blog::findOrFail($id);
    //     $inputs = $request->all();
    //     $newBlogs->update($inputs);
    //     $path = "";
    //     if(request('image')) {
    //         $path = Storage::disk('public')->put('',request('image'));            
    //     }
    //     if($path != "") {
    //         $newBlogs->image = $path;
    //     }else {
    //         $newBlogs->image = request('image');
    //     }

    //     $newBlogs->update(['image' => $path ?? $newBlogs->image]);
    //     return response("Blog was edited successfully !");
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newBlogs = Blog::findOrFail($id);
        $newBlogs->delete();

        return response("Blog was deleted successfully !");
    }
}

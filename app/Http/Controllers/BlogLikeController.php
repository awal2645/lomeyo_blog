<?php

namespace App\Http\Controllers;

use App\Models\BlogLike;
use Illuminate\Http\Request;

class BlogLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        BlogLike::create($request->all());
   
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogLike $blogLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogLike $blogLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogLike $blogLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $like = BlogLike::find($id);
        $like->delete();
        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BlogLike;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->is_admin==1){
            return redirect()->route('home.index');
        }else{
            $total_user = User::all();
            $total_post= BlogPost::all();
            $total_comment= Comment::all(); 
            $total_like = BlogLike::all();
            return view("Backend.home_page", [
        'total_user'=> $total_user,
        'total_post'=> $total_post,
        'total_comment'=> $total_comment,
        'total_like'=> $total_like,
        ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
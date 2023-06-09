<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           
            'comment' => 'required|'
        ]);
        Comment::create($request->all());
   
        return redirect()->back();
    }
}
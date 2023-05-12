<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogFrontEnd;
use App\Models\BlogLike;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\Comment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    //Blog Post Add Form page Controller

    public function AddBlogPost()
    {
        if(Auth::user()->is_admin==1){
            return redirect()->back();
        }else{
        $category = BlogCategory::all();
        $tag = BlogTag::all();
        return view("Backend.Post.add_post", ['cat' => $category,'tag'=>$tag]);
        }
    }
    
    //Blog Post Store  Controller

    public function StoreBlogpost(Request $request)
    {
        if(Auth::user()->is_admin==1){
            return redirect()->back();
        }else{
        // dd($request->all());
        $file = $request->file('header_img');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);
        $imgpath = "/storage/images/$fileName";
        $postData = BlogPost::create([
            'header_title' => $request->header_title,
            'header_img' => $imgpath,
            'read_time' => $request->read_time,
            'category_id' => $request->category_id,
            'user_name' => $request->user_name,
            'blog_title' => $request->blog_title,
            'blog_article' => $request->blog_article,
            'post_slug' => $request->post_slug,
            'featured' => $request->featured,
            'status' => $request->status,
            'description' => $request->description
        ]);
        $relation=$request->tag_id;
        $postData->tag()->attach($relation);
        Alert::success('Congrats', ' Successfully Create');
        return redirect()->back();
    }
    }

    //Blog Post List Controller

    public function ListBlogPost()
    {
        if(Auth::user()->is_admin==1){
            return redirect()->back();
        }else{
        $blog_post = BlogPost::all();

        return view("Backend.Post.post_list", ['blog_post' => $blog_post]);
        }
    }

    //Blog Post Preview Controller

    public function PreviewBlogPost($slug)
    {
        $preview_post = BlogPost::where('post_slug', $slug)->first();
        $id=$preview_post->id;
        $category_id=$preview_post->category_id;
        $status=0;
        $category_post= BlogPost::where('status',$status )->get();
        if(empty(Auth::user()->id)){
            $like= BlogLike::where('post_id', $id)->first();
        
        }else{
            $user_id=Auth::user()->id;
            $like= BlogLike::where('post_id', $id)->where('user_id', $user_id)->first();
        }
        
        $total_like= BlogLike::where('post_id', $id)->get();
        $comment= Comment::where('post_id', $id)->get();
        return view("Backend.Post.preview", ['blog_post' => $preview_post,'total_like'=>$total_like,'category_post' => $category_post,'like'=>$like,'comments'=>$comment]);
    }

    //Blog Post Edit Controller

    public function EditBlogPost($id = null)
    {
        if(Auth::user()->is_admin==1){
            return redirect()->back();
        }else{
        $edit_post = BlogPost::find($id);
        $category = BlogCategory::all();
        $tag = BlogTag::all();
        return view("Backend.Post.edit_post", ['edit_post' => $edit_post, 'cat' => $category,'tag'=>$tag]);
        }
    }

    //Blog Post Update  Controller

    public function UpdateBlogPost(Request $request, $id)
    {
        if(Auth::user()->is_admin==1){
            return redirect()->back();
        }else{
        $post_id = BlogPost::find($id);
        if ($request->hasFile('header_img')) {
            $file = $request->file('header_img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
            if ($post_id->header_img) {
                Storage::delete('public/images/' . $post_id->header_img);
            }
        } else {
            $fileName = $request->header_img;
        }
        $postData = [
            'header_title' => $request->header_title,
            'header_img' => $imgpath,
            'read_time' => $request->read_time,
            'category_id' => $request->category_id,
            'user_name' => $request->user_name,
            'blog_title' => $request->blog_title,
            'blog_article' => $request->blog_article,
            'post_slug' => $request->post_slug,
            'featured' => $request->featured,
            'status' => $request->status,
            'description' => $request->description
        ];
        $post_id->update($postData);
        $relation=$request->tag_id;
        $post_id->tag()->sync($relation);
        Alert::success('Congrats', 'Successfully Update');
        return redirect()->back();
        }
    }

    //Blog Post Delete  Controller

    public function DelBlogPost($id)
    {
        $post = BlogPost::findOrFail($id);
        if (Storage::delete('public/images/' . $post->header_img)) {
            $post->delete();
        }
        Alert::success('Congrats', ' Successfully Delete');

        return redirect()->back()->with('success', 'Created successfully!');
    }
}
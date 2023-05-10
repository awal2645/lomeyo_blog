<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogFrontEnd;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BlogFrontEndController extends Controller
{
       //Blog Tag Add Page Controller

       public function AddBlogFrontend(){
        
        $siteData= BlogFrontEnd::all()->first();
        
        return view("Backend.Frontend.addFrontend",['siteData'=>$siteData]);
    }
    
    //Blog Tag Store Controller

    public function StoreBlogFrontend(Request $request)
    {
        // $validated = $request->validate([
        //     'category_name' => 'required|unique:blog_categories',
        //     'category_des' => 'required'
        //     ]);

        BlogFrontEnd::create($request->all());
        Alert::success('Congrats', 'Successfully Create');
        return redirect()->back();
    }

    //Blog Tag List Controller

    public function ListBlogFrontend()
    {
        $blog_tag = BlogFrontEnd::all();
		
        return view("Backend.Tag.tag_list",['tag'=>$blog_tag]);
    }
    
     //Blog Tag Edit Controller

    public function EditBlogFrontend( $id=null)
    {
		$editData = BlogFrontEnd::find($id);
         return view("Backend.Tag.update_tag",['editData'=>$editData]);

    }
    
 //Blog Tag Update Controller
    
    public function UpdateBlogFrontend(Request $request,$id)
    {

            $post_id = BlogFrontEnd::find($id);
            if ($request->hasFile('site_logo')) {
                $file = $request->file('site_logo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images', $fileName);
                $imgpath = "/storage/images/$fileName";
                if ($post_id->site_logo) {
                    Storage::delete('public/images/' . $post_id->site_logo);
                }
            } else {
                $fileName = $request->site_logo;
            }
            if ($request->hasFile('site_slider')) {
                $file = $request->file('site_slider');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images', $fileName);
                $sliderpath = "/storage/images/$fileName";
                if ($post_id->site_slider) {
                    Storage::delete('public/images/' . $post_id->site_slider);
                }
            } else {
                $fileName = $request->site_slider;
            }
            $post_id->site_name = $request->site_name;
            $post_id->site_logo =  $imgpath;
            $post_id->site_slider = $sliderpath;
            $post_id->site_description = $request->site_description;
            $post_id->save();
            Alert::success('Congrats', 'Successfully Update');
            return redirect()->back();
    }

 //Blog Tag Delete Controller
 
    public function DelBlogFrontend($id)
    {
        $tag = BlogFrontEnd::findOrFail($id);
        $tag->delete();
        Alert::success('Congrats', ' Successfully Delete');
        return redirect()->back();
    }

 //Blog Tag  View Controller
 
    public function TagPost($tag_name){
        $tag=BlogTag::where('tag_name',$tag_name)->first();
        $tag_id= $tag->id;
        $post_id=DB::table('post_tags')->where('tag_id',$tag_id)->get();
        $status=0;
        $post= BlogPost::where('status',$status )->get();
        $siteData= BlogFrontEnd::all()->first();
        return view('Frontend.tag_post',['post'=>$post,'siteData'=>$siteData,'post_id'=>$post_id]);
    }
    
 //Blog Tag Delete Controller
 
    public function CategoryPost($category_slug){
        $category = BlogCategory::where('category_slug',$category_slug)->first();
        $category_id=$category->id;
        $status=0;
        $category_post= BlogPost::where('status',$status )->where('category_id',$category_id)->get();
        return view('Frontend.category_post', ['category_post'=>$category_post]);
    }
        // all post controller 

    public function AllPost(){
        $status=0;
        $all_post= BlogPost::where('status',$status )->get();
        return view("Frontend.all_post",['all_post'=>$all_post]);
    }
    
    // search controller 

    public function Search(){
        $search= BlogPost::where('header_title', 'like', '%' . request('search') . '%')->get();
        return view("Frontend.search",['search'=>$search]);
    }
}
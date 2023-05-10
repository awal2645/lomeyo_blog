<?php

namespace App\Http\Controllers;

use App\Models\BlogTag;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
   //Blog Tag Add Page Controller

    public function AddBlogTag(){
        
        return view("Backend.Tag.add_tag");
    }
    
    //Blog Tag Store Controller

    public function StoreBlogTag(Request $request)
    {
        // $validated = $request->validate([
        //     'category_name' => 'required|unique:blog_categories',
        //     'category_des' => 'required'
        //     ]);

        BlogTag::create($request->all());
        Alert::success('Congrats', 'Successfully Create');
        return redirect()->back();
    }

    //Blog Tag List Controller

    public function ListBlogTag()
    {
        $blog_tag = BlogTag::all();
		
        return view("Backend.Tag.tag_list",['tag'=>$blog_tag]);
    }
    
     //Blog Tag Edit Controller

    public function EditBlogTag( $id=null)
    {
		$editData = BlogTag::find($id);
         return view("Backend.Tag.update_tag",['editData'=>$editData]);

    }
    
 //Blog Tag Update Controller
    
    public function UpdateBlogTag(Request $request,$id)
    {
    
            $tagUpdate= BlogTag::find($id);
            $tagUpdate->tag_name= $request->update_tag_name;
            $tagUpdate->tag_slug= $request->update_tag_slug;
            $tagUpdate->tag_des= $request->update_tag_des;
            $tagUpdate->save();
            Alert::success('Congrats', ' Successfully Update');
            return redirect()->back();
    }

 //Blog Tag Delete Controller
 
    public function DelBlogTag($id)
    {
        $tag = BlogTag::findOrFail($id);
        $tag->delete();
        Alert::success('Congrats', ' Successfully Delete');
        return redirect()->back();
    }
}
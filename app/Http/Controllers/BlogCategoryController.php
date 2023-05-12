<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function AddBlogCategory(){
        if(Auth::user()->is_admin==1){
            return redirect()->back();
        }else{
        return view("Backend.Category.add_category");
        }
    }
    
    public function ListBlogCategory()
    {
        if(Auth::user()->is_admin==1){
            return redirect()->back();
        }else{
        $blog_ctg = BlogCategory::all();
		
        return view("Backend.Category.category_list",['category'=>$blog_ctg]);
        }
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function StoreBlogCategory(Request $request)
    {
        // $validated = $request->validate([
        //     'category_name' => 'required|unique:blog_categories',
        //     'category_des' => 'required'
        //     ]);
       
        BlogCategory::create($request->all());
        Alert::success('Congrats', 'Successfully Create');
        return redirect()->back();
       
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function BlogEdit( $id=null)
    {
		$editData = BlogCategory::find($id);
         return view("Backend.Category.update_category",['editData'=>$editData]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdateBlogCategory(Request $request, $id)
    {
    
            $ctgUpdate= BlogCategory::find( $id);
            $ctgUpdate->category_name= $request->update_category_name;
            $ctgUpdate->category_des= $request->update_category_des;
            $ctgUpdate->save();
            Alert::success('Congrats', ' Successfully Update');
            return redirect()->back();
    }

    public function DelBlogCategory($id)
    {
        $ctg = BlogCategory::findOrFail($id);

        $ctg->delete();
        Alert::success('Congrats', ' Successfully Delete');
        return redirect()->back();
    }
}
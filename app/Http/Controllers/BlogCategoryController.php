<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'category_name' => 'required|unique:blog_categories',
            'category_slug' => 'required',
            'category_img' => 'required',
            ]);
        
            $file = $request->file('category_img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
            if($request->featured){
                $featured=1;
            }else{
                $featured=0;
            }
        
          BlogCategory::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'category_img' => $imgpath,
            'featured' => $featured,
            
        ]);
       
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
        $validated = $request->validate([
            'category_name' => 'required|unique:blog_categories',
            'category_slug' => 'required|unique:blog_categories',
            ]);
           
        $ctgUpdate= BlogCategory::find( $id);
            if ($request->hasFile('category_img')) {
                $file = $request->file('category_img');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images', $fileName);
                $imgpath = "/storage/images/$fileName";
                if ($ctgUpdate->header_img) {
                    Storage::delete('public/images/' . $ctgUpdate->category_img);
                }
            } else {
                $fileName = $request->category_img_name;
                $imgpath = $fileName;
            }
            if($request->featured){
                $featured=1;
            }else{
                $featured=0;
            }
            $ctgdata= [
                'category_name' => $request->category_name,
                'category_slug' => $request->category_slug,
                'featured' => $featured,
                'category_img' => $imgpath,
                
            ];
            $ctgUpdate->update($ctgdata);
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
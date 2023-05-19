<?php

namespace App\Http\Controllers;

use App\Models\FollowUs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FollowUsController extends Controller
{
       //Blog Tag Add Page Controller

       public function AddFollow(){
        
        return view("Backend.Frontend.Follow.add_follow");
    }
    
    //Blog Tag Store Controller

    public function StoreFollow(Request $request)
    {
        $validated = $request->validate([
            'follow_name' => 'required|unique:follow_us',
            'follow_slug' => 'required|unique:follow_us',
            ]);

        FollowUs::create($request->all());
        Alert::success('Congrats', 'Successfully Create');
        return redirect()->back();
    }

    //Blog Tag List Controller

    public function ListFollow()
    {
        $follow_tag = FollowUs::all();
		
        return view("Backend.Frontend.Follow.list_follow",['follow_tag'=>$follow_tag]);
    }
    
     //Blog Tag Edit Controller

    public function EditFollow( $id=null)
    {
		$editFollow= FollowUs::find($id);
         return view("Backend.Frontend.Follow.edit_follow",['editFollow'=>$editFollow]);

    }
    
 //Blog Tag Update Controller
    
    public function UpdateFollow(Request $request,$id)
    {
        $validated = $request->validate([
            'follow_name' => 'required|unique:follow_us',
            'follow_slug' => 'required|unique:follow_us',
            ]);
            $tagUpdate= FollowUs::find($id);
            $tagUpdate->follow_name= $request->follow_name;
            $tagUpdate->follow_slug= $request->follow_slug;
            $tagUpdate->save();
            Alert::success('Congrats', ' Successfully Update');
            return redirect()->back();
    }

 //Blog Tag Delete Controller
 
    public function DelFollow($id)
    {
        $tag = FollowUs::findOrFail($id);
        $tag->delete();
        Alert::success('Congrats', ' Successfully Delete');
        return redirect()->back();
    }
}
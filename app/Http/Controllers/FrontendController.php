<?php

namespace App\Http\Controllers;

use App\Models\BlogFrontEnd;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $status=0;
        $siteData= BlogFrontEnd::all()->first();
        $lates= BlogPost::where('status',$status )->latest()->take(3)->get();
        $latest= BlogPost::where('status',$status )->latest()->take(10)->get();
        $alldata= BlogPost::where('status',$status )->get();
        $tag= BlogTag::all();
        return view("Frontend.frontend",['siteData'=>$siteData,'latest'=>$latest,'lates'=>$lates,'alldata'=>$alldata,'tag'=>$tag]);
    }
}
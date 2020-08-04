<?php

namespace App\Http\Controllers\Frontend;

use App\category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
//    public function DataLayout()
//    {
//
//        $value='بررسی بازی ها';
//        $id_category=category::where('title',$value)->pluck('id')->first();
//        $review_games=Post::with('photos')->where('category_parent',$id_category)->orderBy('created_at','desc')->get();
//
//        return view('Frontend.layout.index',compact(['review_games']));
//  }
}

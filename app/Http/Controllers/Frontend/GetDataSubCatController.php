<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class GetDataSubCatController extends Controller
{
    public function get_sub_data(Request $request)
    {
        $attr_id=$request['attr_id'];
        $ajax_get_sub_posts=Post::with('photos')->orderBy('created_at','desc')->where('category_parent',$attr_id)->take(4)->get();
        return response()->json($ajax_get_sub_posts,200);
  }
}

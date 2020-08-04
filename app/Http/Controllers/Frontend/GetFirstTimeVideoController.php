<?php

namespace App\Http\Controllers\Frontend;

use App\category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class GetFirstTimeVideoController extends Controller
{
    public function get_first_time_video(Request $request)
    {
        $first_name_video= $request['first_name_video'];
                  $get_id_first_time_video=category::where('title',$first_name_video)->pluck('id');
                 $get_first_time_video=Post::with('photos')->with('photos')->where('category_parent',$get_id_first_time_video)->take(4)->orderBy('created_at','desc')->get();
        return response()->json($get_first_time_video,200);
    }
}

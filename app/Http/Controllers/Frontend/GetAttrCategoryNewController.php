<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class GetAttrCategoryNewController extends Controller
{
    public function getAttrCategory(Request $request)
    {
        $value = $request['id'];
        if ($value == 0) {
            $posts = Post::with('photos', 'user')->orderBy('created_at', 'desc')->take(1)->get();
            return response()->json($posts, 200);
        } else {
            $posts = Post::with('photos', 'user')->where('category_parent', $value)->orderBy('created_at', 'desc')->take(1)->get();
            return response()->json($posts, 200);
        }
    }

    public function getmoreAttrCategory(Request $request)
    {
        $value = $request['id'];
        $attr_idd = $request['attr_idd'];
        if ($value == 0) {
            $posts = Post::with('photos', 'user')->whereNotIn('id', $attr_idd)->orderBy('created_at', 'desc')->take(1)->get();
            return response()->json($posts, 200);
        } else {
            $posts = Post::with('photos', 'user')->where('category_parent', $value, 'AND')->whereNotIn('id', $attr_idd)->orderBy('created_at', 'desc')->take(1)->get();
            return response()->json($posts, 200);
        }
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug)
    {

        $detail_post = Post::with('photos', 'video')->where('slug', $slug)->get();
        $post_id = Post::where('slug', $slug)->pluck('id')->first();

        $category_post_id = Post::where('slug', $slug)->pluck('category_parent')->first();

        $related_posts = Post::with('photos')->where('category_parent', $category_post_id)->inRandomOrder()->limit(3)->get();

        $comments = Comment::with(['user', 'childrenRecursive'=>function($q){
            $q->where('status',1);}])->where('post_id', $post_id)->where('parent_id', null)->where('status',1)->orderBy('created_at', 'desc')->get();
        return view('Frontend.details.index', compact(['detail_post', 'related_posts', 'comments']));
    }
}

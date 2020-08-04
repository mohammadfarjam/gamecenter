<?php

namespace App\Http\Controllers\Frontend;

use App\category;
use App\CategoryNewest;
use App\Http\Controllers\Controller;
use App\Post;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {


        $posts=Post::with('photos')->where('status',1)->orderby('created_at','desc')->take(5)->get();

        $all_posts=Post::with('photos','user')->where('status',1)->orderby('created_at','desc')->take(7)->get();

        $category_newest=CategoryNewest::orderBy('created_at','desc')->take(5)->get();

        $value='آخرین برنامه های ویدیویی';
        $category_last_video=category::where('title',$value)->pluck('id');

        $get_last_video_posts=Post::with('photos')->where('status',1)->where('category_parent',$category_last_video)->orderby('created_at','desc')->take(5)->get();

        $Reviews='آخرین بررسی ها';
        $category_last_Reviews=category::where('title',$Reviews)->pluck('id');

        $get_last_Reviews=Post::with('photos')->where('status',1)->where('category_parent',$category_last_Reviews)->orderby('created_at','desc')->take(5)->get();

        return view('Frontend.home.index',compact(['posts','category_newest','get_last_video_posts','get_last_Reviews','all_posts']));
    }
}

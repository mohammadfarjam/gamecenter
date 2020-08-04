<?php

namespace App\Http\Controllers\Backend;

use App\category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Photo;
use App\Photo_desc;
use App\Post;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5)->onEachSide(2);;
        return view('Admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::with('childrenRecursive')->where('parent_id', null)->get();
//        return $categories;
        return view('Admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */


    public function store(Request $request)
    {
//return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'category_parent' => 'required',
            'description' => 'required',
            'meta_title' => 'required|min:5',
            'meta_desc' => 'required|min:5|max:500',
            'meta_keywords' => 'required|min:5',
            'photo_name' => 'required',
        ], [
            'title.required' => '.عنوان مطلب را وارد نمایید',
            'title.min' => '. عنوان مطلب باید بیش از 5 کاراکتر است',
            'photo_name.required' => '.تصویر اصلی را انتخاب نمایید',
            'category_parent.required' => '.دسته بندی را انتخاب نمایید',
            'description.required' => '.توضیحات مطلب خالی است',
            'meta_title.required' => '.عنوان سئو خالی است',
            'meta_title.min' => '.عنوان سئو باید بیش از 5 کاراکتر باشد',
            'meta_desc.required' => '.توضیحات سئو خالی است',
            'meta_keywords.required' => '. کلمات کلیدی خالی است',
            'meta_desc.max' => '.توضیحات سئو بیش از حد مجاز است',
            'meta_desc.min' => '.توضیحات سئو باید بیش از 5 کاراکتر باشد',
            'meta_keywords.required' => '.کلمات کلیدی سئو خالی است',
            'meta_keywords.min' => '.کلمه کلیدی باید بیش از 5 کاراکتر باشد',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $new_post = new Post();
            $new_post->title = $request['title'];
            if (empty($request['slug'])) {
                $slug = SlugService::createSlug(Post::class, 'slug', $request['title']);
            } else {
                $slug = SlugService::createSlug(Post::class, 'slug', $request['slug']);
            }
            $new_post->slug = $slug;
            $new_post->category_parent = $request['category_parent'];
            $new_post->description = $request['description'];
            $new_post->status = $request['status'];
            $new_post->meta_title = $request['meta_title'];
            $new_post->meta_desc = $request['meta_desc'];
            $r = explode(',', $request['meta_keywords']);
            $new_post->meta_keywords = $r;
            $new_post->user_id = Auth::user()->id;
            $new_post->save();


            $new_photo = new Photo();
            $new_photo->path = $request['photo_name'];
            $new_photo->original_name = $request['photo_name_original'];
            $new_photo->post_id = $new_post->id;
            $new_photo->save();


            if ($request['video_path'] == null) {

            } else {
                $new_video = new Video();
                $new_video->user_id = Auth::user()->id;
                $new_video->post_id = $new_post->id;
                $new_video->path = $request['video_name'];
                $new_video->save();
            }


            Session::flash('new_post', 'مطلب جدید با موفقیت ثبت شد.');
            return redirect('administrator/posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('photos', 'video')->whereId($id)->first();
        $categories = category::with('childrenRecursive')->where('parent_id', null)->get();
//return $post;
        return view('Admin.posts.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//return $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'category_parent' => 'required',
            'description' => 'required',
            'meta_title' => 'required|min:5',
            'meta_desc' => 'required|min:5|max:500',
            'meta_keywords' => 'required',
            'photo_id' => 'required',
        ], [
            'title.required' => '.عنوان مطلب را وارد نمایید',
            'title.min' => '. عنوان مطلب باید بیش از 5 کاراکتر است',
            'photo_id.required' => '.تصویر اصلی را انتخاب نمایید',
            'category_parent.required' => '.دسته بندی را انتخاب نمایید',
            'description.required' => '.توضیحات مطلب خالی است',
            'meta_title.required' => '.عنوان سئو خالی است',
            'meta_title.min' => '.عنوان سئو باید بیش از 5 کاراکتر باشد',
            'meta_desc.required' => '.توضیحات سئو خالی است',
            'meta_keywords.required' => '. کلمات کلیدی خالی است',
            'meta_desc.max' => '.توضیحات سئو بیش از حد مجاز است',
            'meta_desc.min' => '.توضیحات سئو باید بیش از 5 کاراکتر باشد',
            'meta_keywords.required' => '.کلمات کلیدی سئو خالی است',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $update_post = Post::findOrFail($id);
            $update_post->title = $request['title'];
            $update_post->slug = $request['slug'];
            $update_post->category_parent = $request['category_parent'];
            $update_post->description = $request['description'];
            $update_post->status = $request['status'];
            $update_post->meta_title = $request['meta_title'];
            $update_post->meta_desc = $request['meta_desc'];
            $r = explode(',', $request['meta_keywords']);
            $update_post->meta_keywords = $r;
            $update_post->user_id = Auth::user()->id;
            $update_post->save();

            if ($request['photo_name'] == null) {

            } else {
                $update_photo = Photo::findorfail($request->photo_id);
                $update_photo->path = $request['photo_name'];
                $update_photo->original_name = $request['photo_name_original'];
                $update_photo->save();
            }

            if ($request['video_path'] == null) {

            } else {
                $update_video = Video::findorfail($request->video_id);
                $update_video->user_id = Auth::user()->id;
                $update_video->path = $request['video_name'];
                $update_video->save();
            }


        }
        Session::flash('edit_post', 'مطلب با موفقیت ویرایش شد.');
        return redirect('administrator/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_post = Post::findorfail($id);
        $del_post->delete();

        Session::flash('delete_post', 'مطلب با موفقیت حذف شد.');
        return redirect('administrator/posts');
    }


}

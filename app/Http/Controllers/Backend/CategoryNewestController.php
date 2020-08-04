<?php

namespace App\Http\Controllers\Backend;

use App\category;
use App\CategoryNewest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryNewestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_newest=CategoryNewest::orderBy('created_at','desc')->take(6)->get();
        return view('Admin.categories_newest.index',compact('category_newest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::with('childrenRecursive')->where('parent_id',null)->get();

        return view('Admin.categories_newest.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=category::findorfail($request->category_newest);
        $newewst_category=new CategoryNewest();
        $newewst_category->title=$category->title;
        $newewst_category->id_value=$request['category_newest'];
        $newewst_category->save();

        Session::flash('create_category_newest','دسته بندی ایجاد شد.');
        return redirect('administrator/categories_newest');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category_newest=CategoryNewest::findorfail($id);
//        return $category_newest;
        $categories=category::with('childrenRecursive')->where('parent_id',null)->get();
        return view('Admin.categories_newest.edit',compact(['category_newest','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return $request->all();
        $category=category::findorfail($request->category_newest);
        $newewst_category=CategoryNewest::findorfail($id);
        $newewst_category->title=$category->title;
        $newewst_category->id_value=$request['category_newest'];
        $newewst_category->save();

        Session::flash('update_category_newest','دسته بندی ویرایش شد.');
        return redirect('administrator/categories_newest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newewst_category_del=CategoryNewest::findorfail($id);
        $newewst_category_del->delete();
        Session::flash('delete_category_newest','دسته بندی حذف شد.');
        return redirect('administrator/categories_newest');
    }
}

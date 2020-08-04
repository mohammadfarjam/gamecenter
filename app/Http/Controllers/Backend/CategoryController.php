<?php

namespace App\Http\Controllers\Backend;

use App\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::with('childrenRecursive')->where('parent_id', null)->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::where('parent_id', null)->get();
        return view('Admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_category = new category();
        $new_category->title = $request['title'];
        $new_category->parent_id = $request['category_parent'];
        $new_category->meta_title = $request['meta_title'];
        $new_category->meta_desc = $request['meta_desc'];
        $new_category->meta_keywords = $request['meta_keywords'];

        $new_category->save();
        Session::flash('created', 'دسته بندی جدید ایجاد شد');
        return redirect('administrator/categories');
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
        $category = category::whereId($id)->first();
        $categories = category::where('parent_id', null)->get();
        $subcategories = category::where('parent_id', $id)->get();
        return view('Admin.categories.edit', compact(['category', 'categories', 'subcategories']));
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
//        return $request->subcategories;
        $edit_category = category::findorfail($id);
        $edit_category->title = $request['title'];
        $edit_category->parent_id = $request['category_parent'];
        $edit_category->meta_title = $request['meta_title'];
        $edit_category->meta_desc = $request['meta_desc'];
        $edit_category->meta_keywords = $request['meta_keywords'];
        $edit_category->save();

        $subcategories_id = category::where('parent_id', $id)->whereNotIn('id',$request['subcategories'])->delete();


        Session::flash('edited', 'دسته بندی ویرایش شد');
        return redirect('administrator/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_category = category::where('parent_id', $id)->orwhere('id', $id)->delete();
        Session::flash('deleted', 'دسته بندی حذف شد');
        return redirect('administrator/categories');
    }


}

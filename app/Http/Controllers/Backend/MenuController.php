<?php

namespace App\Http\Controllers\Backend;

use App\category;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_menus=Menu::orderBy('created_at','desc')->get();
        return view('Admin.menu.index',compact(['new_menus']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories=category::where('parent_id',null)->orderBy('created_at','desc')->get();
        return view('Admin.menu.create',compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id= $request['category_id'];
        $title_categories=category::where('id',$category_id)->pluck('title')->first();

        $new_menu=new Menu();
        $new_menu->title=$title_categories;
        $new_menu->id_value=$category_id;
        $new_menu->save();

        Session::flash('store_new_menu','منوی جدید ایجاد شد.');
            return redirect('administrator/menu');
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

        $new_menu=Menu::where('id',$id)->get('id_value')->first();
//        return $new_menu;
        $categories=category::where('parent_id',null)->orderBy('created_at','desc')->get();



        return view('Admin.menu.edit',compact(['categories','new_menu']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_menu=Menu::findorfail($id);
        $delete_menu->delete();

        Session::flash('delete_menu','منو حذف شد.');
        return redirect('administrator/menu');
    }
}

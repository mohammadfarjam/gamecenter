<?php

namespace App\Http\Controllers\Backend;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::with('user')->orderBy('created_at','desc')->paginate(10);
        return view('Admin.comments.index',compact(['comments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $view_comment=Comment::with('user')->whereId($id)->first();
//        return $view_comment;
        return view('Admin.comments.edit',compact(['view_comment']));
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
        $edit_comment=Comment::findorfail($id);
        $edit_comment->comment=$request['description'];
        $edit_comment->status=$request['status'];
        $edit_comment->save();

        Session::flash('publish_comment', 'نظر منتشر شد.');
        return redirect('administrator/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_comment=Comment::where('id',$id)->orwhere('parent_id',$id)->delete();

        Session::flash('delete_comment', 'نظر حذف شد.');
        return redirect('administrator/comments');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function upload(Request $request)
    {
        $uploadedfile=$request->file('file');
        $filename=time().$uploadedfile->getClientOriginalName();
        $video_name=$uploadedfile->getClientOriginalName();
        Storage::disk('local')->putFileAs('public/videos' , $uploadedfile,$filename);

        $video=new Video();
        $video->path=$filename;
//        $video->save();

        return response()->json([
            'video_path'=>$video->path,
            'video_name'=>$filename,


        ],200);
    }
}

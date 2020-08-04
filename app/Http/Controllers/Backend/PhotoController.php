<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $uploadedfile=$request->file('file');
        $filename=time().$uploadedfile->getClientOriginalName();
        $original_name=$uploadedfile->getClientOriginalName();
        Storage::disk('local')->putFileAs('public/photos_posts' , $uploadedfile,$filename);

        $photo=new Photo();
        $photo->original_name=$original_name;
        $photo->path=$filename;
//        $photo->save();

        return response()->json([
//            'photo_id'=>$photo->id
            'photo_name'=>$filename,
            'photo_original_name'=>$photo->original_name,


        ]);
    }
}

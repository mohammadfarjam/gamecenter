<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Photo_desc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PhotoDescController extends Controller
{
    public function upload(Request $request)
    {
        $uploadedfile = $request->file('file');
        $filename = time() . $uploadedfile->getClientOriginalName();
        $original_name = $uploadedfile->getClientOriginalName();
        Storage::disk('local')->putFileAs('public/photos_desc', $uploadedfile, $filename);

        $photo_desc = new Photo_desc();
        $photo_desc->path = $filename;
        $photo_desc->original_name = $original_name;
        $photo_desc->save();

        $back_photo_desc=Photo_desc::orderBy('created_at','desc')->take(1)->first();
        return json_encode(['location'=>$back_photo_desc->path]);

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_desc extends Model
{
    protected $table='photo_desc';
    protected $upload='/storage/photos_desc/';
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function getPathAttribute($photos)
    {
        return $this->upload.$photos;
    }
}

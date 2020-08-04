<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table='photos_posts';
    protected $upload='/storage/photos_posts/';

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getPathAttribute($photos)
    {
        return $this->upload.$photos;
    }
}

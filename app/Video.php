<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='videos';
    protected $upload='/storage/videos/';

    public function posts()
    {
        return $this->hasOne(Post::class);
    }
    public function getPathAttribute($videos)
    {
        return $this->upload.$videos;
    }
}

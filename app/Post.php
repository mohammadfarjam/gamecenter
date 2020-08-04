<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    protected $casts=['meta_keywords'=>'array'];

    use Sluggable;


    public function photos()
    {
        return $this->hasOne(Photo::class);
    }
    public function photo_desc()
    {
        return $this->hasMany(Photo_desc::class);
    }

    public function categories()
    {
        return $this->belongsTo(category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' =>'title'
            ]
        ];
    }

    public function video()
    {
        return $this->hasOne(Video::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}

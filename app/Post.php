<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'contents', 'slug', 'category_id', 'featured'
    ];


    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function tags()
    {
    return $this->belongsToMany('App\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

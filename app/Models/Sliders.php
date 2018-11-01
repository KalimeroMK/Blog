<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['title', 'link', 'image', 'lang', 'imagemedium', 'imagethumb', 'description', 'user_id', 'post_id', 'category_id', 'workflow_id', 'created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}

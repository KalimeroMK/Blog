<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Workflow;

class Slider extends Model
{
    protected $table = 'slider';
    protected $fillable = ['title', 'link', 'image', 'lang', 'imagemedium', 'imagethumb', 'description', 'user_id', 'workflow_id', 'created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function createdby()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }




}

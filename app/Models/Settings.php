<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {

	protected $table = 'settings';
	protected $fillable = ['title', 'mainurl', 'email', 'link', 'address',
		'logo', 'logomedium', 'logothumb', 'description', 'user_id', 'workflow_id', 'created_at', 'updated_at',
		'phone', 'twitter', 'facebook', 'linkedin', 'gplus', 'youtube', 'flickr', 'pinterest'];

	public function user() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function createdby() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}

}

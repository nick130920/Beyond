<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class profile extends Model
{
    public function groups(){
		return $this->belongsToMany('App\groups', 'group_member', 'profile_id', 'group_id')->withTimestamps();
	}
	public function id_types(){
		return $this->hasMany('App\id_type');
	}
	public function deliveries(){
		return $this->hasMany('App\delivery');
	}
	public function news(){
		return $this->hasMany('App\news');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
}

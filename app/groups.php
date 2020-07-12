<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    public function news(){
		return $this->hasMany('App\news');
	}
	public function evaluation_criterias(){
		return $this->hasMany('App\evaluation_criteria');
	}
	public function profiles(){
		return $this->belongsToMany('App\profile', 'group_member','group_id','profile_id')->withTimestamps();
	}
	public function themes(){
		return $this->hasMany('App\theme');
	}
	public function materials(){
		return $this->hasManyThrough('App\material', 'App\theme');
	}
	public function works(){
		return $this->hasManyThrough('App\work', 'App\theme');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theme extends Model
{
    public function groups(){
    	return $this->belongsTo('App\groups');
    }
    public function materials(){
		return $this->hasMany('App\material');
	}
	public function works(){
		return $this->hasMany('App\work');
	}
	public function resources(){
		return $this->belongstoMany('App\resource', 'resources_has_themes','themes','resources');
	}
}

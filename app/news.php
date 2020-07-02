<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    public function resources(){
		return $this->belongsToMany('App\resource', 'resources_has_news', 'news', 'resources')->withTimestamps();
	}
	public function groups(){
		return $this->belongsTo('App\groups');
	}
	public function profiles(){
		return $this->belongsTo('App\profiles');
	}
}

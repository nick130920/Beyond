<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
	public function themes(){
		return $this->belongsTo('App\themes');
	}
	public function resources(){
		return $this->belongsToMany('App\resource', 'resources_has_materials', 'materials', 'resources')->withTimestamps();
	}
	

}

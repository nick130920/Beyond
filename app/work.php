<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class work extends Model
{
	public function themes(){
		return $this->belongsTo('App\theme');
	}
	public function evaluation_criterias(){
		return $this->belongsTo('App\evaluation_criteria');
	}
	public function resources(){
		return $this->belongsToMany('App\resource', 'resources_has_works','works','resources');
	}
}

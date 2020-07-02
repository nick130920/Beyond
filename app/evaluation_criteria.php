<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluation_criteria extends Model
{
    public function groups(){
		return $this->belongsTo('App\groups');
	}
	public function works(){
		return $this->hasMany('App\work');
	}
}

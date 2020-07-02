<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    public function profiles(){
		return $this->belongsTo('App\profile');
	}
	public function resources(){
		return $this->belongsToMany('App\resource', 'resources_has_deliveries', 'deliveries', 'resources')->withTimestamps();
	}
}

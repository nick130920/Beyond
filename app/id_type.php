<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class id_type extends Model
{
    public function profile(){
    	return $this->belongsTo('App\profile');
    }
}

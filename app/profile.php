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
		return $this->hasOne('App\id_type');
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
  public function group_member(){
    return $this->hasMany('App\group_member', 'profile_id');
  }
  public function consolidated(){
		return $this->hasMany('App\consolidated');
	}
  public function getUrlAttribute(){
    if (substr($this->image,0,4) === "http") {
      return $this->image;
    }
    if ($this->image) {
      return '/images/profile/'.$this->image;
    }else {
      return '/images/profile/user_default.png';
    }
  }
}

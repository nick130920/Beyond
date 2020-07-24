<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consolidated extends Model
{
  public function evaluation_criteria(){
    return $this->belongsTo('App\evaluation_criteria');
  }
  public function profile(){
    return $this->belongsTo('App\profile');
  }
  public function groups(){
    return $this->belongsTo('App\groups');
  }
}

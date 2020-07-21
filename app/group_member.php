<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group_member extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'group_member';
  public function profiles(){
    return $this->belongsTo('App\profile', 'profile_id', 'id');
  }
  public function user(){
		return $this->profiles->belongsTo('App\User');
	}
}

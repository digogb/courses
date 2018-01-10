<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingCycle extends Model
{
    
	public $timestamps = false;


	public function entries(){

		return $this->hasMany('App\Entrie','bcycle_id');
	}

}

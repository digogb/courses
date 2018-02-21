<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
 	protected $fillable = ['bcycle_id', 'name', 'value'];
 	protected $primaryKey = 'id';

    public $timestamps = false;

	public function billingCycle(){

		return $this->belongsTo('App\BillingCycle', 'bcycle_id');
	}

}

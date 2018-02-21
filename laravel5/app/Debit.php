<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
  	protected $fillable = ['id', 'bcycle_id', 'name', 'value', 'status'];

    public $timestamps = false;

	public function billingCycle(){

		return $this->belongsTo('App\BillingCycle', 'bcycle_id');
	}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingCycle extends Model
{
    
	protected $fillable = ['name', 'month', 'year', 'user_id', 'credits', 'debits' ];

	public $timestamps = false;


	public function credits(){

		return $this->hasMany('App\Credit', 'bcycle_id');
	}

	public function debits(){

		return $this->hasMany('App\Debit', 'bcycle_id');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id');	
	}

	public function getTotalCredits(){

		return (float)$this->credits->sum('value');	
	}

	public function getTotalDebits(){

		return (float)$this->debits->sum('value');	
	}

	public function getTotal(){

		return $this->getTotalCredits() - $this->getTotalDebits();	
	}

}

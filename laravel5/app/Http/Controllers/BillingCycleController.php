<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillingCycle;

class BillingCycleController extends Controller
{
    
    public function index(){

    	$billingCycles = BillingCycle::all();
    	$tab = 'tabList';

    	return view('billingCycle', compact('billingCycles','tab'));
    }

    public function update($id){

    	$billingCycles = BillingCycle::all();
    	$billingCycle = BillingCycle::find($id);    	
    	$tab = 'tabUpdate';

    	return view('billingCycle', compact('billingCycles', 'billingCycle','tab'));
    }

    public function remove($id){

    	dd($id);
    }
}

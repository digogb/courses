<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingCycleController extends Controller
{
    

    public function index(){
    	return view('createBillingCycle');
    }
}

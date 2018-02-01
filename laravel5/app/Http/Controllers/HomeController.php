<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billingcycle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billingCycles = BillingCycle::all();

        $totalCredits = 0;
        $totalDebits = 0;
        $total = 0;

        foreach($billingCycles as $billingCycle){
            $totalCredits += $billingCycle->getTotalCredits();
            $totalDebits += $billingCycle->getTotalDebits();
        }

        $total = $totalCredits - $totalDebits;

        return view('home', compact('total','totalCredits','totalDebits'));
    }
}

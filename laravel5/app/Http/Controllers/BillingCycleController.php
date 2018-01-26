<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillingCycle;
use App\Credit;
use App\Debit;

class BillingCycleController extends Controller
{
    
    public function index($tab = 'tabList', $billingCycle = null){

    	$billingCycles = BillingCycle::all();
        if(!isset($billingCycle)) {
            $billingCycle = new BillingCycle;
            $billingCycle->name = "teste";
        }

    	return view('billingCycle', compact('billingCycles','tab', 'billingCycle'));
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

    public function addCreditRow(Request $request){

        $creditRow = new Credit;

        $billingCycle = $this->fillEntries($request->input('credits')); 
        return $this->index('tabCreate', $billingCycle);

    }

    public function store(Request $request){

        $billingCycle = $this->fillEntities($request);

        $billingCycle->save();


        return $this->index();
    }

    private function fillEntities($request){

        $billingCycle = new BillingCycle;

        $billingCycle->fill($request->except('credits','debits'));
        $billingCycle->user_id = \Auth::id();
       
        $credits = $request->input('credits');
        $debits = $request->input('debits');


        if(isset($credits)) {
            $creditsPopulated = [];
            foreach ($credits as $credit) {
                $newCredit = new Credit;
                $newCredit->fill($credit);

                array_push($creditsPopulated, $newCredit);
            }

            $billingCycle->credits->add($creditsPopulated);
        }    

        if(isset($debits)) {
            $debitsPopulated = [];
            foreach ($debits as $debit) {
                $newDebit = new Debit;
                $newDebit->fill($debit);

                array_push($debitsPopulated, $newDebit);
            }

            $billingCycle->debits->add($debitsPopulated);
        }    

        return $billingCycle;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\BillingCycle;
use App\Credit;
use App\Debit;

class BillingCycleController extends Controller
{
    
    public function index($tab = 'tabList', $billingCycle = null){

    	$billingCycles = BillingCycle::all();
        if(!isset($billingCycle)) {
            $billingCycle = new BillingCycle;
        }

        return view('billingCycle', compact('billingCycles', 'tab', 'billingCycle'));    
    	
    }

    public function find($id){

        $tab = 'tabUpdate';
    	$billingCycle = BillingCycle::find($id);
       	return view('billingCycle', compact('billingCycle','tab'));
    }

    public function remove($id){

    	dd($id);
    }

    public function addCreditRow(Request $request){

        $tab = $request->input('tab');

        $billingCycle = $this->fillEntities($request);

        $row = new Credit;
        $billingCycle->credits->push($row);

        return $this->index($tab, $billingCycle);
    }

    public function addDebitRow(Request $request){

        $tab = $request->input('tab');

        $billingCycle = $this->fillEntities($request);

        $row = new Debit;
        $billingCycle->debits->push($row);

        return $this->index($tab, $billingCycle);
    }

    public function cloneCredit($index, Request $request){
       
        $tab = $request->input('tab');

        $billingCycle = $this->fillEntities($request);

        $credit = $billingCycle->credits->get($index);

        $billingCycle->credits->push($credit);

        return $this->index($tab, $billingCycle);
    }

    public function cloneDebit($index, Request $request){
       
        $tab = $request->input('tab');

        $billingCycle = $this->fillEntities($request);

        $debit = $billingCycle->debits->get($index);

        $billingCycle->debits->push($debit);

        return $this->index($tab, $billingCycle);
    }


    public function remCreditRow($index, Request $request){

        $tab = $request->input('tab');

        $billingCycle = $this->fillEntities($request);

        $billingCycle->credits->pull($index);

        return $this->index($tab, $billingCycle);
    }

    public function remDebitRow($index, Request $request){

        $tab = $request->input('tab');

        $billingCycle = $this->fillEntities($request);

        $billingCycle->debits->pull($index);

        return $this->index($tab, $billingCycle);        
    }


    public function store(Request $request){

        $billingCycle = $this->fillBillingCycle($request->except('credits','debits'));

        $billingCycle->save();

        $credits = $this->fillCredits($request->input('credits'));
        $debits = $this->fillDebits($request->input('debits'));

        if(isset($credits)){
            $billingCycle->credits()->saveMany($credits);    
        }
        
        if(isset($debits)){
            $billingCycle->debits()->saveMany($debits);    
        }

        return $this->index();
    }


    public function update(Request $request){

        $billingCycle = $this->fillEntities($request);

        $credits = $this->fillCredits($request->input('credits'));
        $debits = $this->fillDebits($request->input('debits'));

        $billingCycle->credits()->update($credits);

        return $this->index();
    }



    private function fillEntities($request){

        $billingCycle = $this->fillBillingCycle($request->except('credits','debits'));

        $billingCycle->credits = collect($this->fillCredits($request->input('credits')));        
        $billingCycle->debits = collect($this->fillDebits($request->input('debits')));
        
        return $billingCycle;
    }

    private function fillBillingCycle($billingCycleRequest){
        $billingCycle = new BillingCycle;

        $billingCycle->fill($billingCycleRequest);
        $billingCycle->user_id = \Auth::id();

        return $billingCycle;
    }

    private function fillCredits($credits) {

        $creditsPopulated = [];
        if(isset($credits)) {    
            foreach ($credits as $credit) {
                $newCredit = new Credit;
                $newCredit->fill($credit);

                array_push($creditsPopulated, $newCredit);
            }
        }    
        return $creditsPopulated;
    }

    private function fillDebits($debits) {
        $debitsPopulated = [];
        if(isset($debits)) {
            foreach ($debits as $debit) {
                $newDebit = new Debit;
                $newDebit->fill($debit);

                array_push($debitsPopulated, $newDebit);
            }
        }
        return $debitsPopulated;
    }    
}

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

        return view('billingCycle', compact('billingCycles','tab', 'billingCycle'));    
    	
    }

    public function find($id){

    	$billingCycle = BillingCycle::find($id);
    	$tab = 'tabUpdate';

       	return view('billingCycle', compact('billingCycle','tab'));
    }

    public function remove($id){

    	dd($id);
    }

    public function addCreditRow($tab, Request $request){

        $billingCycle = $this->fillEntities($request);

        $row = new Credit;
        $billingCycle->credits->add($row);

        if($tab == 'tabCreate'){
            return $this->index($tab, $billingCycle);    
        } elseif($tab = 'tabUpdate'){
            return view('billingCycle', compact('billingCycle','tab'));
        }

    }

    public function addDebitRow(Request $request){

        $billingCycle = $this->fillEntities($request);

        $row = new Debit;
        $billingCycle->debits->add($row);

        return $this->index('tabCreate', $billingCycle);

    }

    public function cloneCredit($index, Request $request){
       
        $billingCycle = $this->fillEntities($request);

        $credit = $billingCycle->credits->get($index);

        $billingCycle->credits->add($credit);

        return $this->index('tabCreate', $billingCycle);

    }

    public function cloneDebit($index, Request $request){
       
        $billingCycle = $this->fillEntities($request);

        $debit = $billingCycle->debits->get($index);

        $billingCycle->debits->add($debit);

        return $this->index('tabCreate', $billingCycle);

    }


    public function remCreditRow($index, Request $request){

        $billingCycle = $this->fillEntities($request);

        $billingCycle->credits->pull($index);

        return $this->index('tabCreate', $billingCycle);

    }

    public function remDebitRow($index, Request $request){

        $billingCycle = $this->fillEntities($request);

        $billingCycle->debits->pull($index);

        return $this->index('tabCreate', $billingCycle);

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

    private function fillEntities($request){

        $billingCycle = $this->fillBillingCycle($request->except('credits','debits'));

        $credits = $this->fillCredits($request->input('credits'));
        $debits = $this->fillDebits($request->input('debits'));

        $billingCycle->credits = collect([]);;
        $billingCycle->debits = collect([]);;
        foreach($credits as $credit) {
            $billingCycle->credits->add($credit);    
        }

        foreach($debits as $debit) {
            $billingCycle->debits->add($debit);
        }
       
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

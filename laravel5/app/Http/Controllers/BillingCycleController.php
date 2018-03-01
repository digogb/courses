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

    public function findRemove($id){

        $tab = 'tabRemove';
        $billingCycle = BillingCycle::find($id);
        return view('billingCycle', compact('billingCycle','tab'));
    }

    public function createOrUpdate(Request $request){

        $tab = $request->old('tab');
        $billingCycle = new BillingCycle;
        $billingCycle->id = $request->old('id');
        $billingCycle->credits = collect($this->fillCredits($request->old('credits')));
        $billingCycle->debits = collect($this->fillDebits($request->old('debits')));

        return view('billingCycle', compact('billingCycle','tab'));           
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

        $validate = $this->validateRequest($request);

        if(!$validate->fails()) {

            \DB::transaction(function() use ($request){

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
            });    

            return redirect('billingCycles')->with('success','Ciclo de pagamento criado com sucesso!');

        } else {
            return redirect('billingCycles/createOrUpdate')
                        ->withErrors($validate)
                        ->withInput();
        }   
    }

    public function update(Request $request){

        $validate = $this->validateRequest($request);

        if(!$validate->fails()) {

            \DB::transaction(function() use ($request) {

                $billingCycleStored = BillingCycle::find($request->input('id'));
                $this->fillBillingCycle($request->except('credits','debits'), $billingCycleStored);

                $billingCycleStored->save();

                $credits = $this->fillCredits($request->input('credits'));
                $debits = $this->fillDebits($request->input('debits'));

                $billingCycleStored->credits()->delete();
                $billingCycleStored->debits()->delete();

                if(isset($credits)){
                    $billingCycleStored->credits()->saveMany($credits);    
                }
                
                if(isset($debits)){
                    $billingCycleStored->debits()->saveMany($debits);    
                }
                
            });

            return redirect('billingCycles')->with('success','Ciclo de pagamento atualizado com sucesso!');

        } else {
            return redirect('billingCycles/createOrUpdate')
                        ->withErrors($validate)
                        ->withInput();
        }   
    }

    public function remove($id){

        \DB::transaction(function() use ($id){
            
            $billingCycleStored = BillingCycle::find($id);

            $billingCycleStored->credits()->delete();
            $billingCycleStored->debits()->delete();    
            $billingCycleStored->delete();

        });    

        return redirect('billingCycles')->with('success','Ciclo de pagamento removido com sucesso!');
    }


    private function fillEntities($request){

        $billingCycle = $this->fillBillingCycle($request->except('credits','debits'));

        $billingCycle->credits = collect($this->fillCredits($request->input('credits')));        
        $billingCycle->debits = collect($this->fillDebits($request->input('debits')));
        
        return $billingCycle;
    }

    private function fillBillingCycle($billingCycleRequest, $billingCycle = null){
        
        if(!isset($billingCycle)) {
            $billingCycle = new BillingCycle;    
        }
        
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

    private function validateRequest($request){

        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'month' => 'required|numeric',
            'year' => 'required|numeric',

            'credits.*.name' => 'required',
            'credits.*.value' => 'required|numeric',

            'debits.*.name' => 'required',
            'debits.*.value' => 'required|numeric',
            'debits.*.status' => 'required|in:Pendente,Pago',
        ]);

        return $validator;      
    }
}

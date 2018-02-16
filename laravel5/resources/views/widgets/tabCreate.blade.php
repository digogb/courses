@php
    session(['tab'=>$tab]);
@endphp
<div class="tab-pane" id="tabCreate">
    @include('widgets.billingCycleForm',['urlAction'=>'/billingCycles/store', 'tab'=>'tabCreate', 'buttonName'=>'Incluir'])
</div>

@php
    session(['tab'=>$tab]);
@endphp
<div class="tab-pane" id="tabUpdate">
  @include('widgets.billingCycleForm',['urlAction'=>'/billingCycles/update', 'tab'=>'tabUpdate', 'buttonName'=>'Atualizar'])
</div>

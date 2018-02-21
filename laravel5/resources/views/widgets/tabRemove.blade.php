@if( $tab == 'tabRemove')
  <div class="tab-pane active" id="tabUpdate">
        @include('widgets.billingCycleForm',['urlAction'=>'/billingCycles/remove/'.$billingCycle->id, 'tab'=>'tabRemove', 'buttonName'=>'Remover', 'readOnly'=>'true'])
  </div>
@endif

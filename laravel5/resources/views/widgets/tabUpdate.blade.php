@if( $tab == 'tabUpdate')
<div class="tab-pane active" id="tabUpdate">
@endif
    <form action="/billingCycles/update" method="POST">

        {{csrf_field()}}
        <div class="box-body">
            <input type="hidden" name="id" value="{{$billingCycle->id}}">
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Nome', 'name'=>'name', 'placeHolder'=>'Informe o  nome', 'readOnly'=>'false', 'fieldValue'=> $billingCycle->name ])
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Mês', 'name'=>'month', 'placeHolder'=>'Informe o mês', 'readOnly'=>'false', 'fieldValue'=> $billingCycle->month ])
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Ano', 'name'=>'year', 'placeHolder'=>'Informe o ano', 'readOnly'=>'false', 'fieldValue'=> $billingCycle->year])
            <div class="col col-xs-12">
                <fieldset>
                    <legend>Resumo</legend>
                    <div class="row">
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'green', 'icon'=>'bank', 'value'=>'R$ '.$billingCycle->getTotalCredits(), 'text'=>'Total de Créditos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'red', 'icon'=>'credit-card', 'value'=>'R$ '.$billingCycle->getTotalDebits(), 'text'=>'Total de Débitos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'blue', 'icon'=>'money', 'value'=>'R$ '. $billingCycle->getTotal(), 'text'=>'Valor Consolidado'])
                    </div>
                </fieldset>
            </div>   

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
                   @include('widgets.creditsFieldset', ['billingCycle'=>$billingCycle, 'tab'=>$tab]) 
                </fieldset>
                <div class="row">
                </div>
            </div>        

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
                   @include('widgets.debitsFieldset', ['billingCycle'=>$billingCycle])
                </fieldset>
            </div>        
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <button formaction="/billingCycles/" type="submit" class="btn btn-default">Cancelar</button>
        </div>    
    </form>
</div>

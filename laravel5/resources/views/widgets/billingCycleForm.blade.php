<form action="{{$urlAction}}" method="POST">

        {{csrf_field()}}
        <input type="hidden" name="tab" value="{{$tab}}">
        <div class="box-body">
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Nome', 'name'=>'name', 'placeHolder'=>'Informe o  nome', 'fieldValue'=>$billingCycle->name, 'readOnly'=>'false'])

            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Mês', 'name'=>'month', 'placeHolder'=>'Informe o mês', 'fieldValue'=>$billingCycle->month, 'readOnly'=>'false'])

            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Ano', 'name'=>'year', 'placeHolder'=>'Informe o ano', 'fieldValue'=>$billingCycle->year, 'readOnly'=>'false'])
            <div class="col col-xs-12">
                <fieldset>
                    <legend>Resumo</legend>
                    <div class="row">
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'green', 'icon'=>'bank', 'value'=>'R$ '.$billingCycle->getTotalCredits(), 'text'=>'Total de Créditos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'red', 'icon'=>'credit-card', 'value'=>'R$ ' .$billingCycle->getTotaldebits(), 'text'=>'Total de Débitos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'blue', 'icon'=>'money', 'value'=>'R$ '. $billingCycle->getTotal(), 'text'=>'Valor Consolidado'])
                    </div>
                </fieldset>
            </div>   

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
                  @include('widgets.creditsFieldset', ['billingCycle'=>$billingCycle, 'tab'=>'$tab'])
                </fieldset>
                <div class="row">

                </div>
            </div>        

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
                    @include('widgets.debitsFieldset', ['billingCycle'=>$billingCycle, 'tab'=>'$tab'])
                </fieldset>
            </div>        
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{$buttonName}}</button>
            <button formaction="/billingCycles/" type="submit" class="btn btn-default">Cancelar</button>
        </div>    
    </form>
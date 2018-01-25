@if( $tab == 'tabCreate')
<div class="tab-pane active" id="tabCreate">
@else
<div class="tab-pane" id="tabCreate">
@endif
    <form action="/billingCycles/store" method="POST">

        {{csrf_field()}}
        <div class="box-body">
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Nome', 'name'=>'name', 'placeHolder'=>'Informe o  nome', 'readOnly'=>'false'])
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Mês', 'name'=>'month', 'placeHolder'=>'Informe o mês', 'readOnly'=>'false'])
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Ano', 'name'=>'year', 'placeHolder'=>'Informe o ano', 'readOnly'=>'false'])
            <div class="col col-xs-12">
                <fieldset>
                    <legend>Resumo</legend>
                    <div class="row">
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'green', 'icon'=>'bank', 'value'=>'R$ 0', 'text'=>'Total de Créditos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'red', 'icon'=>'credit-card', 'value'=>'R$ 0', 'text'=>'Total de Débitos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'blue', 'icon'=>'money', 'value'=>'R$ 0', 'text'=>'Valor Consolidado'])
                    </div>
                </fieldset>
            </div>   

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
                  @include('widgets.creditsFieldset')
                </fieldset>
                <div class="row">

                </div>
            </div>        

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
                    @include('widgets.debitsFieldset')
                </fieldset>
            </div>        
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Incluir</button>
            <button type="button" class="btn btn-default">Cancelar</button>
        </div>    
    </form>
</div>

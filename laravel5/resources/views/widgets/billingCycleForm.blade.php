@php
  $disabled = ($readOnly == 'true' ? 'disabled' : '');
  $readOnly = ($readOnly == 'true' ? 'readonly' : '');
@endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(['url' => $urlAction, 'method' => 'post'])}}
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$billingCycle->id}}">
        <input type="hidden" name="tab" value="{{$tab}}">
        <div class="box-body">
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Nome', 'name'=>'name', 'placeHolder'=>'Informe o  nome', 'fieldValue'=>$billingCycle->name, 'readOnly'=> $readOnly])

            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Mês', 'name'=>'month', 'placeHolder'=>'Informe o mês', 'fieldValue'=>$billingCycle->month, 'readOnly'=> $readOnly])

            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Ano', 'name'=>'year', 'placeHolder'=>'Informe o ano', 'fieldValue'=>$billingCycle->year, 'readOnly'=> $readOnly])
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
                    @include('widgets.creditsFieldset', ['billingCycle'=>$billingCycle, 'tab'=>'$tab', 'readOnly'=>$readOnly, 'disabled'=>$disabled])
                </fieldset>
            </div>        

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
                    @include('widgets.debitsFieldset', ['billingCycle'=>$billingCycle, 'tab'=>'$tab', 'readOnly'=>$readOnly, 'disabled'=>$disabled])
                </fieldset>
            </div>        
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{$buttonName}}</button>
            <button formaction="/billingCycles/" type="submit" class="btn btn-default">Cancelar</button>
        </div>    
{{ Form::close()}}
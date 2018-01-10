@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard <small>Versão 1.0</small></h1>
@stop

@section('content')
    <div class="row">
    	@component('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'green', 'icon'=>'bank', 'value'=>'R$ 0', 'text'=>'Total de Créditos'])
    	@endcomponent
        @component('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'red', 'icon'=>'credit-card', 'value'=>'R$ 0', 'text'=>'Total de Débitos'])
        @endcomponent
        @component('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'blue', 'icon'=>'money', 'value'=>'R$ 0', 'text'=>'Valor Consolidado'])
        @endcomponent
	</div>

	<a class="button" href="/teste">teste</a>
@stop
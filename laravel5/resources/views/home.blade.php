@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard <small>Versão 1.0</small></h1>
@stop

@section('content')
    <div class="row">
    	@include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'green', 'icon'=>'bank', 'value'=>'R$ '. $totalCredits, 'text'=>'Total de Créditos'])
        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'red', 'icon'=>'credit-card', 'value'=>'R$ '. $totalDebits, 'text'=>'Total de Débitos'])
        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'blue', 'icon'=>'money', 'value'=>'R$ '. $total, 'text'=>'Valor Consolidado'])
	</div>
@stop
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ciclos de Pagamento <small>Cadastro</small></h1>
@stop

@section('content')
    <div class="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs"> 
                    <li class="active">
                        <a href="#tabList" data-toggle='tab'><i class='fa fa-bars'></i> Listar</a>
                    </li>
                    <li>        
                        <a href="#tabCreate" data-toggle='tab'><i class='fa fa-plus'></i> Incluir</a>
                    </li>

                    <li>
                        <a href="#tabUpdate" data-toggle='tab' aria-expanded='true'><i class='fa fa-pencil'></i> Alterar</a>
                    </li>    

            </ul>
            <div class='tab-content'>
                @include('widgets.tabList',[ 'tab'=> 'tabList' , 'billingCycles' => $billingCycles])
                @include('widgets.tabCreate',[ 'tab'=> 'tabCreate', 'billingCycle' =>$billingCycle])
                @include('widgets.tabUpdate',[ 'tab'=> 'tabUpdate', 'billingCycle' => $billingCycle ])
            </div>
        </div>
	</div>
@stop


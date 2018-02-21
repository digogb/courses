@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ciclos de Pagamento <small>Cadastro</small></h1>
@stop

@section('content')
    <div class="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs"> 
                @if( $tab != 'tabUpdate' && $tab != 'tabRemove')
                    <li class="active">
                        <a href="#tabList" data-toggle='tab'><i class='fa fa-bars'></i> Listar</a>
                    </li>
                    <li>        
                        <a href="#tabCreate" data-toggle='tab'><i class='fa fa-plus'></i> Incluir</a>
                    </li>
                @endif     
                @if( $tab == 'tabUpdate')
                    <li class="active">
                        <a href="#tabUpdate" data-toggle='tab' aria-expanded='true'><i class='fa fa-pencil'></i> Alterar</a>
                    </li>    
                @endif        
                @if( $tab == 'tabRemove')
                    <li class="active">
                        <a href="#tabRemove" data-toggle='tab' aria-expanded='true'><i class='fa fa-trash-o'></i> Excluir</a>
                    </li>    
                @endif        
            </ul>
            <div class='tab-content'>
                @if($tab != 'tabUpdate' && $tab != 'tabRemove') 
                    @include('widgets.tabList',[ 'tab'=> $tab , 'billingCycles' => $billingCycles])
                    @include('widgets.tabCreate',[ 'tab'=> $tab, 'billingCycle' => $billingCycle])
                @endif    
                @if($tab == 'tabUpdate')    
                    @include('widgets.tabUpdate',[ 'tab'=> $tab, 'billingCycle' => $billingCycle ])
                @endif
                @if($tab == 'tabRemove')    
                    @include('widgets.tabRemove',[ 'tab'=> $tab, 'billingCycle' => $billingCycle ])
                @endif        
            </div>
        </div>
	</div>
@stop


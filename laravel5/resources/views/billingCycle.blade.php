@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ciclos de Pagamento <small>Cadastro</small></h1>
@stop

@section('content')
    <div class="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs"> 
                @if( $tab == 'tabList' )
                    <li class="active">
                @else
                    <li>       
                @endif     
                        <a href="#tabList" data-toggle='tab'><i class='fa fa-bars'></i> Listar</a>
                    </li>
                @if( $tab == 'tabCreate')
                    <li class="active">
                @else
                    <li>        
                @endif    
                        <a href="#tabCreate" data-toggle='tab'><i class='fa fa-plus'></i> Incluir</a>
                    </li>
                @if( $tab == 'tabUpdate')
                    <li class="active">
                        <a href="#tabUpdate" data-toggle='tab' aria-expanded='true'><i class='fa fa-pencil'></i> Alterar</a>
                    </li>    
                @endif        
            </ul>
            <div class='tab-content'>
                @if($tab != 'tabUpdate') 
                    @include('widgets.tabList',[ 'tab'=> $tab , 'billingCycles' => $billingCycles])
                    @include('widgets.tabCreate',[ 'tab'=> $tab ])
                @endif    
                @if($tab == 'tabUpdate')
                    @include('widgets.tabUpdate',[ 'tab'=> $tab, 'billingCycle' => $billingCycle ])
                @endif    
            </div>
        </div>
	</div>
@stop


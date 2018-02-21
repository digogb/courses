<legend>Créditos</legend>    
<table class="table" id="tCredit">
  @if(!$billingCycle->credits->isEmpty()) 
    <thead>
      <tr>
        <th>Nome</th>
        <th>Valor</th>
        <th class="table-actions">Ações</th>
      </tr>
    </thead>
   @endif   
    <tbody>
  @forelse($billingCycle->credits as $credit)         
    <tr>
       <td>
           @include('widgets.field', ['cols'=>explodeDivColumns('12'), 'name'=>'credits['.$loop->index.'][name]', 'placeHolder'=>'Informe o nome', 'fieldValue'=>$credit->name, 'readOnly'=> $readOnly])
       </td>
       <td>
           @include('widgets.field', ['cols'=>explodeDivColumns('12'), 'name'=>'credits['.$loop->index.'][value]', 'placeHolder'=>'Informe o valor', 'fieldValue'=>$credit->value, 'readOnly'=> $readOnly])
       </td>                  
       <td>
           @include('widgets.actionButton', ['action'=>'/billingCycles/addCreditRow', 'class'=>'btn btn-success', 'disabled'=>$disabled, 'icon'=>'fa fa-plus'])
           @include('widgets.actionButton', ['action'=>'/billingCycles/cloneCredit/'.$loop->index, 'class'=>'btn btn-warning', 'disabled'=>$disabled, 'icon'=>'fa fa-clone'])
           @include('widgets.actionButton', ['action'=>'/billingCycles/remCreditRow/'.$loop->index, 'class'=>'btn btn-danger', 'disabled'=>$disabled, 'icon'=>'fa fa-trash-o'])
       </td>
    </tr>
  @empty  
      <tr>
        <button formaction="/billingCycles/addCreditRow" type="submit" class="btn btn-primary" {{$disabled}}>Adicionar Crédito</a>
      </tr>  
  @endforelse
      </tbody>  
</table>

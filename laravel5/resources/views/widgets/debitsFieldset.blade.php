<legend>Débitos</legend>    
<table class="table" id="tDebit">
  @if(!$billingCycle->debits->isEmpty()) 
    <thead>
      <tr>
        <th>Nome</th>
        <th>Valor</th>
        <th>Status</th>
        <th class="table-actions">Ações</th>
      </tr>
    </thead>
  @endif
    <tbody>
  @forelse($billingCycle->debits as $debit)         
      <tr>
         <td>             
             @include('widgets.field', ['cols'=>explodeDivColumns('12'), 'name'=>'debits['.$loop->index.'][name]', 'placeHolder'=>'Informe o nome', 'fieldValue'=>$debit->name, 'readOnly'=> $readOnly])
         </td>
         <td>
             @include('widgets.field', ['cols'=>explodeDivColumns('12'), 'name'=>'debits['.$loop->index.'][value]', 'placeHolder'=>'Informe o valor', 'fieldValue'=>$debit->value, 'readOnly'=> $readOnly])
         </td>
         <td>
             @include('widgets.field', ['cols'=>explodeDivColumns('12'), 'name'=>'debits['.$loop->index.'][status]', 'placeHolder'=>'Informe o status', 'fieldValue'=>$debit->status, 'readOnly'=> $readOnly])
         </td>                                    
         <td>
            @include('widgets.actionButton', ['action'=>'/billingCycles/addDebitRow', 'class'=>'btn btn-success', 'disabled'=>$disabled, 'icon'=>'fa fa-plus'])
            @include('widgets.actionButton', ['action'=>'/billingCycles/cloneDebit/'.$loop->index, 'class'=>'btn btn-warning', 'disabled'=>$disabled, 'icon'=>'fa fa-clone'])
            @include('widgets.actionButton', ['action'=>'/billingCycles/remDebitRow/'.$loop->index, 'class'=>'btn btn-danger', 'disabled'=>$disabled, 'icon'=>'fa fa-trash-o'])
         </td>                                                              
      </tr>
   @empty
    <tr>
      <button formaction="/billingCycles/addDebitRow" type="submit" class="btn btn-primary" {{$disabled}}>Adicionar Débito</a>
    </tr>  
   @endforelse
    </tbody>
</table>
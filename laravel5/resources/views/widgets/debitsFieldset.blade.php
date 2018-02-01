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
             <input name="debits[{{$loop->index}}][name]" class="form-control" placeholder="Informe o nome" value="{{$debit->name}}">
         </td>
         <td>
             <input name="debits[{{$loop->index}}][value]" class="form-control" placeholder="Informe o valor" value="{{$debit->value}}">   
         </td>
         <td>
             <input name="debits[{{$loop->index}}][status]" class="form-control" placeholder="Informe o status" value="{{$debit->status}}">   
         </td>                                    
         <td>
             <button formaction="/billingCycles/addDebitRow" type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
             <button formaction="/billingCycles/cloneDebit/{{$loop->index}}" type="submit" class="btn btn-warning"><i class="fa fa-clone"></i></button>
             <button formaction="/billingCycles/remDebitRow/{{$loop->index}}" type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
         </td>                                                              
      </tr>
   @empty
    <tr>
      <button formaction="/billingCycles/addDebitRow" type="submit" class="btn btn-primary">Adicionar Débito</i></a>
    </tr>  
   @endforelse
    </tbody>
</table>
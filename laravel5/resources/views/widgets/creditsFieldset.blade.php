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
           <input name="credits[{{$loop->index}}][name]" class="form-control" placeholder="Informe o nome" value="{{$credit->name}}">
       </td>
       <td>
           <input name="credits[{{$loop->index}}][value]" class="form-control" placeholder="Informe o valor" value="{{$credit->value}}" >   
       </td>                  
       <td>
           <button formaction="/billingCycles/addCreditRow" type="submit" class="btn btn-success"><i class="fa fa-plus"></i></a>
           <button formaction="/billingCycles/cloneCredit/{{$loop->index}}" type="submit" class="btn btn-warning"><i class="fa fa-clone"></i></button>
           <button formaction="/billingCycles/remCreditRow/{{$loop->index}}" type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
       </td>
    </tr>
  @empty  
      <tr>
        <button formaction="/billingCycles/addCreditRow" type="submit" class="btn btn-primary">Adicionar Crédito</i></a>
      </tr>  
    @endforelse
      </tbody>  
</table>

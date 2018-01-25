<legend>Débitos</legend>    
<table class="table" id="tDebit">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Status</th>
            <th class="table-actions">Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
           <td>
               <input name="debits[0][name]" class="form-control" placeholder="Informe o nome">
           </td>
           <td>
               <input name="debits[0][value]" class="form-control" placeholder="Informe o valor">   
           </td>
           <td>
               <input name="debits[0][status]" class="form-control" placeholder="Informe o status">   
           </td>                                    
           <td>
               <button onclick="addDebit();" type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
               <button onclick="cloneDebit();" type="button" class="btn btn-warning"><i class="fa fa-clone"></i></button>
               <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
           </td>                                                              
        </tr>
    </tbody>
</table>
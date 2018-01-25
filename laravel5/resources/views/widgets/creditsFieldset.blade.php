<legend>Créditos</legend>    
  <table class="table" id="tCredit">
      <thead>
          <tr>
              <th>Nome</th>
              <th>Valor</th>
              <th class="table-actions">Ações</th>
          </tr>
      </thead>
      <tbody>

          <tr>
             <td>
                 <input name="credits[0][name]" class="form-control" placeholder="Informe o nome" ">
             </td>
             <td>
                 <input name="credits[0][value]" class="form-control" placeholder="Informe o valor"">   
             </td>                  
             <td>
                 <a href="/billingCycles/addCreditRow" type="button" class="btn btn-success"><i class="fa fa-plus"></i></a>
                 <button onclick="cloneCredit();" type="button" class="btn btn-warning"><i class="fa fa-clone"></i></button>
                 <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
             </td>
          </tr>

      </tbody>  
  </table>

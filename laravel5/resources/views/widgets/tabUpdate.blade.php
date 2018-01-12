@if( $tab == 'tabUpdate')
<div class="tab-pane active" id="tabUpdate">
@endif
    <form>
        <div class="box-body">
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Nome', 'name'=>'name', 'placeHolder'=>'Informe o  nome', 'readOnly'=>'false', 'value'=> $billingCycle->name ])
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Mês', 'name'=>'month', 'placeHolder'=>'Informe o mês', 'readOnly'=>'false', 'value'=> $billingCycle->month ])
            @include('widgets.field', ['cols'=>explodeDivColumns('12 4'), 'label'=>'Ano', 'name'=>'year', 'placeHolder'=>'Informe o ano', 'readOnly'=>'false', 'value'=> $billingCycle->year])
            <div class="col col-xs-12">
                <fieldset>
                    <legend>Resumo</legend>
                    <div class="row">
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'green', 'icon'=>'bank', 'value'=>'R$ 0', 'text'=>'Total de Créditos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'red', 'icon'=>'credit-card', 'value'=>'R$ 0', 'text'=>'Total de Débitos'])
                        @include('widgets.value-box', ['cols'=>explodeDivColumns('12 4'), 'color'=>'blue', 'icon'=>'money', 'value'=>'R$ 0', 'text'=>'Valor Consolidado'])
                    </div>
                </fieldset>
            </div>   

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
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
                                   <input name="cName" class="form-control" placeholder="Informe o nome">
                               </td>
                               <td>
                                   <input name="cValue" class="form-control" placeholder="Informe o valor">   
                               </td>                  
                               <td>
                                   <button type="button" class="btn btn-success"><i class="fa fa-plus" onclick="addRow();"></i></button>
                                   <button type="button" class="btn btn-warning"><i class="fa fa-clone"></i></button>
                                   <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                               </td>                                                              
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
                <div class="row">

                </div>
            </div>        

            <div class="col col-xs-12 col-sm-6">
                <fieldset>
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
                                   <input name="cName" class="form-control" placeholder="Informe o nome">
                               </td>
                               <td>
                                   <input name="cValue" class="form-control" placeholder="Informe o valor">   
                               </td>
                               <td>
                                   <input name="cStats" class="form-control" placeholder="Informe o status">   
                               </td>                                    
                               <td>
                                   <button onclick="addRow();" type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                   <button type="button" class="btn btn-warning"><i class="fa fa-clone"></i></button>
                                   <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                               </td>                                                              
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>        
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Incluir</button>
            <button type="button" class="btn btn-default">Cancelar</button>
        </div>    
    </form>
</div>

@if( $tab == 'tabList')
    <div class="tab-pane active" id="tabList">
@else
    <div class="tab-pane"  id="tabList">
@endif
    <div>
        <table class="table ">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Mês</th>
                    <th>Ano</th>
                    <th class="table-actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($billingCycles as $billingCycle)
                <tr>
                    <td>{{$billingCycle->name}}</td>
                    <td>{{$billingCycle->month}}</td>
                    <td>{{$billingCycle->year}}</td>
                    <td>                                        
                        <a class="btn btn-warning" href="/billingCycles/find/{{$billingCycle->id}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger" href="/billingCycles/findRemove/{{$billingCycle->id}}"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @empty
               @endforelse
            </tbody>
        </table>
    </div>
</div>

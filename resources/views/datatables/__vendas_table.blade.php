
<table id="table" class="table table-striped" style="width:100%">
    
    <thead>
        <tr>
            <th>Código</th>
            <th>Comprador</th>
            <th>Validada Por</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vendas as $venda)
            <tr>
                <td>{{ $venda->id }}</td>
                <td>{{ $venda->user->username }}</td>
                <td>{{ $venda->admin->username }}</td>
                <td>{{$venda->total}} Kz</td>
                <td>Finalizada</td>
                <td>
                     <a href="" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                    
                     
                </td>

            </tr>
        @endforeach


    </tbody>
    <tfoot>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
        </tr>
    </tfoot>
</table>

@section('table')
    <script>
        $(document).ready(function() {
            tabela = $('#table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json",

                }
            });


        });
    </script>
@endsection

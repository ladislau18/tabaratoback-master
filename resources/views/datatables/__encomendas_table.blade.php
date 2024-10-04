
<table id="table" class="table table-striped" style="width:100%">
    
    <thead>
        <tr>
            <th>Código</th>
            <th>Comprador</th>
            
            <th>Total</th>
            <th>Estado</th>
            <th>Acções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ecos as $eco)
            <tr>
                <td>{{ $eco->id }}</td>
                <td>{{ $eco->user->username }}</td>
                
                <td>{{$eco->total}} Kz</td>
                <td>Pendente</td>
                <td>
                     <a href="" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                     <a href="{{route('venda.finalizar',['id' => $eco->id])}}" class="btn btn-primary"> <i class="fa fa-check"></i></a>
                     
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


<table id="table" class="table table-striped" style="width:100%">
    
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            
            <th>Sobrenome</th>
            <th>Username</th>
            <th>Cargo</th>
            <th>Acções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                
                <td>{{$user->sobrenome}}</td>
                <td>{{$user->username}}</td>
                @if ($user->id_tipo == 1)
                    <td>Administrador</td>
                @else
                    <td>Normal</td>
                @endif
                <td>
                    <a href="" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                    <a href="" class="btn btn-primary"> <i class="fa fa-pencil"></i></a>
                    <a href="" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                     
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

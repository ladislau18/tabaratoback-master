<table id="table" class="table table-striped" style="width:100%">

    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Acções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nome }}</td>
                <td>{{ $producto->preco }} Kz</td>
                <td>Tecnologia</td>
                <td>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fa fa-pencil"></i></button>

                </td>

            </tr>


            <!--Modal -->
            <div class="modal" tabindex="-1" id="exampleModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Gerir Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('forms.__gerir_producto_form')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Fim -->
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

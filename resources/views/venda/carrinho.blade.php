@extends('home')

@section('content')
    <table id="carrinho" class="table table-hover table-condensed mt-7">
        <thead>
            <tr>
                <th style="width:50%">Producto</th>
                <th style="width:10%">Preço</th>
                <th style="width:8%">Quantidade</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('carrinho'))
                @foreach (session('carrinho') as $id => $detalhes)
                    @php $total += $detalhes['preco'] * $detalhes['quantidade'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/' . $detalhes['foto']) }}"
                                        width="100" height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $detalhes['nome'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="preco">${{ $detalhes['preco'] }}</td>
                        <td data-th="quantidade">
                            <input type="number" value="{{ $detalhes['quantidade'] }}"
                                class="form-control quantidade update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $detalhes['preco'] * $detalhes['quantidade'] }}
                        </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Total {{ $total }}Kz</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continuar
                        Escolhendo</a>
                    <div class="mt-3"></div>
                    <form action="{{ route('venda.encomendar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total" value="{{$total}}">
                        <button class="btn btn-success" type="submit">Finalizar</button>
                    </form>
                    
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('carrinho.update') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantidade: ele.parents("tr").find(".quantidade").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".finalizar").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('venda.encomendar') }}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    total: {{ $total }},

                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Tem certeza que quer remover?")) {
                $.ajax({
                    url: '{{ route('carrinho.remove') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection

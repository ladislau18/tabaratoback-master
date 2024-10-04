@isset($productos)
    @foreach ($productos as $producto)
        <!-- Card Producto -->

        <div class="col-3 mb-3">
            <div class="card">
                <img class="card-img"
                    src="{{asset('images/'.$producto->foto)}}" alt="foto">

                <div class="card-body ">
                    <h4 class="card-title">{{$producto->nome}}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Vendedor: {{$producto->loja->nome}}</h6>
                    <p class="card-text">{{$producto->descricao}}</p>

                    <div class="buy d-flex justify-content-between align-items-center">
                        <div class="price text-success">
                            <h5 class="mt-4">{{$producto->preco}}Kz</h5>
                        </div>
                        <a href="{{route('carrinho.add',$producto->id)}}" class="btn btn-warning mt-3"><i class="fas fa-shopping-cart"></i> Add ao Carrinho</a>
                    </div>
                </div>
            </div>
        </div>

        

    @endforeach
@endisset

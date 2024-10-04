@extends('index')

@section('title', 'Produtos')


@section('content')
 <div class="container-lg">
        <div class="row my-5">
            @isset($productos)
                @foreach ($productos as $producto)



              <div class="col-8 col-lg-4 col-xl-3">
                <div class="card border-0 shadow rounded-3 overflow-hidden">
                    <div class="img1">{{$producto->foto}}</div>
                     <div class="main-text">
                       <h4>{{$producto->nome}}</h4>
                       <p class="preco_produto  my-4 text-danger fw-bold">Preço : {{$producto->preco}}</p>
                       <P class="local lead ">Local : {{$producto->preco}}</P>
                       <p class="empresa">Publicado por : {{$producto->categoria_id}}</p>
                       <p class="st">Stock : {{$producto->stock}}</p>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#CB1-modal" class="btn btn-outline-primary " >Ver Mais</button>
                       <a href="#" class="btn btn-danger">Adicionar</a>
                       @csrf
                     </div>
                </div>
            </div>

                @endforeach
                @endisset

        </div>
    </div>
@endsection

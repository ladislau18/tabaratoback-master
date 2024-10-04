@extends('index')

@section('title', 'Pagina Inicial')

@section('content')
    <!-- Imagem -->
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center banner-image">

        <div class="content text-center">
            <h1 class="text-white">TABARATO</h1>
            <h3 class="text-white">Bem vindo ao Tabarato, compre e venda com facilidade!</h3>

            <div class="content text-center">
                <div>
                    <a href="{{route('user.cadastrar_view')}}" class="btn btn-warning">Criar Conta</a>
                </div>
                <div>
                    <a href="{{route('login')}}" class=" text-left">Login</a>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Prouductos -->
    <section>
        <div class="container mt-5">
            <h3 class="text-center">Productos</h3>
            <div class="row">
                @include('cards.__producto')
            </div>
        </div>
    </section>

@endsection

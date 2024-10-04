<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/producto.css') }}">


    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">


    <script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <title>@yield('title')</title>
</head>

<body>

    <!-- Navbar  -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 bg-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="#">Tabarato</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    @auth 
                    
                    @php
                        if (!empty(auth()->user()->id_tipo == 2)):
                        if (!empty(auth()->user()->loja)):

                    @endphp
                        
                        
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('loja.dashboard') }}">Meu Negócio</a>
                            </li>
                        @php
                            else: 
                        @endphp
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('loja.cadastrar_view') }}">Meu Negócio</a>
                            </li>
                        @php
                         endif;
                        else:

                        @endphp
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                        @php
                            endif;
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}">Sair</a>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.cadastrar_view') }}">Criar Conta</a>
                        </li>
                    @endguest

                    <li class="nav-item">
                        <div class="dropdown">
                            <button type="button" class="btn btn-link " data-toggle="dropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                                    class="badge badge-pill badge-danger">{{ count((array) session('carrinho')) }}</span>
                            </button>
                            <div class="dropdown-menu">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                            class="badge badge-pill badge-danger">{{ count((array) session('carrinho')) }}</span>
                                    </div>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ((array) session('carrinho') as $id => $detalhes)
                                        @php
                                            $total += $detalhes['preco'] * $detalhes['quantidade'];
                                        @endphp
                                    @endforeach
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info"> {{ $total }}Kz</span></p>
                                    </div>
                                </div>
                                @if (session('carrinho'))
                                    @foreach (session('carrinho') as $id => $detalhes)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{ asset('images/' . $detalhes['foto']) }}" />
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p>{{ $detalhes['nome'] }}</p>
                                                <span class="price text-info"> ${{ $detalhes['preco'] }}</span> <span
                                                    class="count">
                                                    Quantidade:{{ $detalhes['quantidade'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('carrinho') }}" class="btn btn-warning btn-block">Ver
                                            Tudo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>



    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif




    @yield('content')

    @yield('scripts')
    <script src="{{ asset('js/index.js') }}"></script>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021-2022 PAP</p>
</body>


</html>

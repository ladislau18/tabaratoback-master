@extends('loja.dashboard.dashboard')

@section('title', 'Cadastrar Producto')



@section('dashboard-content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row ">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Cadastrar Producto</h1>
                            <p class="lead">
                                <br>
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    @include('forms.__producto_form')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
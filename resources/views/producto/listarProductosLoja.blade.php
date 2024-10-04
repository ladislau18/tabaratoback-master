@extends('loja.dashboard.dashboard')

@section('title', 'Productos')



@section('dashboard-content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div-row>
                <h2 class="text-center">Productos</h2>
            </div-row>
            <div class="row mb-4">
                <div class="col-10">
                    <a href="{{route('producto.cadastrar_view')}}" class="btn btn-lg btn-info"> <i class="fa fa-plus"></i> Novo</a>
                </div>

                
            </div>
            @include('datatables.__producto_table')
        </div>
    </main>



@endsection

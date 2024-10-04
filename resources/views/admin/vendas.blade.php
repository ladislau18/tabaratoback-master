@extends('admin.dashboard')

@section('title', 'Vendas')



@section('dashboard-content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div-row>
                <h2 class="text-center">Vendas</h2>
            </div-row>

            @include('datatables.__vendas_table')
        </div>
    </main>



@endsection

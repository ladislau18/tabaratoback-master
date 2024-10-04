@extends('admin.dashboard')

@section('title', 'Encomendas')



@section('dashboard-content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div-row>
                <h2 class="text-center">Encomendas</h2>
            </div-row>

            @include('datatables.__encomendas_table')
        </div>
    </main>



@endsection

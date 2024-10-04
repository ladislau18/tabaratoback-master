@extends('admin.dashboard')

@section('title', 'Productos')



@section('dashboard-content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div-row>
                <h2 class="text-center">Productos</h2>
            </div-row>

            @include('datatables.__producto_table')
        </div>
    </main>



@endsection

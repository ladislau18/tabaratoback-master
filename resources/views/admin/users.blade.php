@extends('admin.dashboard')

@section('title', 'Usuários')



@section('dashboard-content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div-row>
                <h2 class="text-center">Usuários</h2>
            </div-row>

            @include('datatables.__users_table')
        </div>
    </main>



@endsection

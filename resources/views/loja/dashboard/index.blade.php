@extends('loja.dashboard.dashboard')

@section('title','Dashboard')
    


@section('dashboard-content')
<div class="row">
    <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Vendas</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{$total_de_vendas}}</h1>
                            <div class="mb-0">
                                <!--<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                <span class="text-muted">Desde a semana passada</span>-->
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Visitantes</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">14.212</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                <span class="text-muted">Desde a semana passada</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Ganhos</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{$total ?? 0 }} Kz</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                <span class="text-muted">Desde a semana passada</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Encomendas</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">64</h1>
                            <div class="mb-0">
                                <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                <span class="text-muted">Desde a semana passada</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Movimentações Recentes</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Productos Mais Vendidos</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="d-none d-xl-table-cell">Categoria</th>
                        <th class="d-none d-xl-table-cell">Total de Vendas</th>
                        <th class="d-none d-xl-table-cell">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>16-inch MacBook Pro 2021</td>
                        <td class="d-none d-xl-table-cell">Tecnologia</td>
                        <td class="d-none d-xl-table-cell">100K</td>
                        <td><span class="badge bg-success">Ver</span></td>
                        <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xxl-3 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Vendas Mensais</h5>
            </div>
            <div class="card-body d-flex w-100">
                <div class="align-self-center chart chart-lg">
                    <canvas id="chartjs-dashboard-bar"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuários do App</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\AlunosModel::all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Turmas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\TurmaModel::all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Exercícios</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{\App\ExercicioModel::all()->count()}}</div>
                                </div>
{{--                                <div class="col">--}}
{{--                                    <div class="progress progress-sm mr-2">--}}
{{--                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-running fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Eventos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\AgendaModel::all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Últimos Posts
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <td>Post</td>
                            <td>Data</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\PostModel::orderBy('id', 'desc')->take(5)->get() as $post)
                            <tr>
                                <td>{{$post->titulo}}</td>
                                <td>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Faturas em atraso
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <td>Vencimento</td>
                            <td>Valor</td>
                            <td>Aluno</td>
                        </tr>
                        </thead>
                        <tbody>

                        @php ($faturas =  \App\FinanceiroModel::all()->where('data_venc', '<', \Carbon\Carbon::now())->where('data_pag', ''))
                        @foreach($faturas as $vencido)
                            <tr>
                                <td>{{\Carbon\Carbon::parse($vencido->data_venc)->format('d/m/Y')}}</td>
                                <td>{{$vencido->valor}}</td>
                                <td align="center"><a class="btn btn-sm btn-dark" href="{{route('financeiro.show', $vencido->id_aluno)}}"><i class="fa fa-user"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

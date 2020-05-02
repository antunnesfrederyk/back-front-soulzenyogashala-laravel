@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Criar Novo Evento</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample">
                    <div class="card-body p-4">
                        <form method="post" action="{{route('agenda.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_user" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            <div class="row">
                                <div class="form-group col-md-8 col-12">
                                    <label class="mb-0">Nome do Evento:</label>
                                    <input class="form-control" type="text" name="titulo" placeholder="">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="mb-0">Data e Hora:</label>
                                    <input class="form-control" type="datetime-local" name="data" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label class="mb-0">Endereço:</label>
                                    <input class="form-control" type="text" name="endereco" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label class="mb-0">Descrição:</label>
                                    <textarea class="form-control" rows="3" name="descricao"></textarea>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="mb-0">Link do Evento:</label>
                                    <input class="form-control" type="url" name="link">
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label class="mb-0">Valor:</label>
                                    <input class="form-control" type="text" name="valor">
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <button class="btn btn-primary mt-4" type="submit">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Eventos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Data / Valor</th>
                                <th>Nome / Endereço / Descrição</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Data / Valor</th>
                                <th>Nome / Endereço / Descrição</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody style="font-size: 14px">
                            @foreach($dados as $dado)
                                <tr>
                                    <td>
                                        {{$dado->data}}<br>
                                        <span class="text-success">{{$dado->valor}}</span>
                                    </td>
                                    <td>
                                        <span class="text-primary" style="font-size: 18px">{{$dado->titulo}}</span><br>
                                        {{$dado->endereco}}<br>
                                        <a href="{{$dado->link}}">{{$dado->link}}</a><br>
                                        {{$dado->descricao}}
                                    </td>
                                    <td align="center">

                                        @if($dado->data >= \Carbon\Carbon::now())
                                        <form action="{{route('agenda.destroy', $dado->id)}}" method="post">
                                            @csrf
                                            <input name="_method" value="delete" type="hidden">
                                            <button  class="btn btn btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                        @else
                                            Evento Passado
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

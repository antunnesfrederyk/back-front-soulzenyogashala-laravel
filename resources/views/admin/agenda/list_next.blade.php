@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Próximos Eventos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome / Endereço / Descrição</th>
                                <th>Data / Valor</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome / Endereço / Descrição</th>
                                <th>Data / Valor</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody style="font-size: 14px">
                            @foreach($dados as $dado)
                                <tr>
                                    <td>
                                        <span class="text-primary" style="font-size: 18px">{{$dado->titulo}}</span><br>
                                        {{$dado->endereco}}<br>
                                        <a href="{{$dado->link}}">{{$dado->link}}</a><br>
                                        {{$dado->descricao}}
                                    </td>
                                    <td>
                                        {{$dado->data}}<br>
                                        <span class="text-success">{{$dado->valor}}</span>
                                    </td>
                                    <td align="center">
                                        <form action="{{route('agendas.destroy', $dado->id)}}" method="post">
                                            @csrf
                                            <input name="_method" value="delete" type="hidden">
                                            <button  class="btn btn btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
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

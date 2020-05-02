@extends('layouts.app')

@section('content')
    @php($turmas = \App\TurmaModel::all())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Usuários do Aplicativo</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome / Email / Nascimento</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Turma</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome / Email / Nascimento</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Turma</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($dados as $dado)
                                <tr>
                                    <td><span class="text-primary">{{$dado->nome}}</span><br><span style="font-size: 14px;">{{$dado->email}}<br>{{\Carbon\Carbon::parse($dado->nascimento)->format('d/m/Y')}}</span></td>
                                    <td>{{$dado->endereco}}, {{$dado->bairro}}<br>{{$dado->cidade}} - {{$dado->cep}}</td>
                                    <td>{{$dado->telefone}}</td>
                                    <td align="center">
                                        @if($dado->turma == '')
                                            <div id="semgrupo{{$dado->id}}">
                                                <label style="font-size: 14px">Nenhuma Turma</label>
                                                <a href="{{route('turma.index')}}" class="btn btn-sm btn-dark">Adicionar a Turma</a>
                                            </div>

                                        @else
                                            @foreach($turmas as $turma)
                                                @if($turma->id == $dado->turma)
                                                    <a href="{{route('turma.show',$turma->id )}}" class="btn btn-primary">{{$turma->nome}}</a>
                                                @endif
                                            @endforeach
                                            <br>{{$dado->dataprimeiraaula}}
                                        @endif
                                    </td>
                                    <td align="center">
                                        <form action="{{route('aluno.destroy', $dado->id)}}" method="post">
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

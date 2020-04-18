@extends('layouts.app')

@section('content')
    @php($turmas = \App\TurmaModel::all())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

{{--            <div class="card shadow mb-4">--}}
{{--                <!-- Card Header - Accordion -->--}}
{{--                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">--}}
{{--                    <h6 class="m-0 font-weight-bold text-primary">Cadastrar ...</h6>--}}
{{--                </a>--}}
{{--                <!-- Card Content - Collapse -->--}}
{{--                <div class="collapse" id="collapseCardExample">--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="post" action="#" enctype="multipart/form-data">--}}

{{--                            <div class="form-group col-md-4 col-12">--}}
{{--                                <label class="mb-0">Nome</label>--}}
{{--                                <input class="form-control">--}}
{{--                            </div>--}}

{{--                            <div class="w-100 mt-1" align="right">--}}
{{--                                <button type="submit" class="btn btn-primary">Salvar</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

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
                                                <button onclick="inseriremgrupo({{$dado->id}})" class="btn btn-sm btn-success">Adicionar a Turma</button>
                                            </div>
                                            <div id="inseriremgrupo{{$dado->id}}" style="display: none">
                                                <form action="{{route('inseriremturma')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id_aluno" value="{{$dado->id}}">
                                                    <select class="form-control form-control-user" name="id_turma" required>
                                                        @foreach($turmas as $turma)
                                                        <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-sm btn-success mt-1 w-100">Salvar</button>
                                                </form>
                                            </div>
                                        @else
                                            @foreach($turmas as $turma)
                                                @if($turma->id ==$dado->turma)
                                                    {{$turma->nome}}
                                                @endif
                                            @endforeach
                                            <br>{{$dado->dataprimeiraaula}}
                                            <a  class="btn btn-sm btn-dark mt-1 w-100" href="{{route('removerdaturma', $dado->id)}}">Remover Turma</a>
                                        @endif
                                    </td>
                                    <td align="center">
                                        <form action="{{route('alunos.destroy', $dado->id)}}" method="post">
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

    <script type="text/javascript">
        function inseriremgrupo(id) {
                document.getElementById('semgrupo'+id).style.display = "none";
                document.getElementById('inseriremgrupo'+id).style.display = "block";
        }
    </script>
@endsection

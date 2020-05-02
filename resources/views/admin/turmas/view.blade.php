@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-7">
                        <h1 class="m-0 font-weight-bold text-primary">{{$dado->nome}}</h1>
                        <h5>{{$dado->descricao}}</h5>
                </div>
                <div class="col-5" align="right">
                    <div class="float-right bg-white p-2" style="border-radius: 10px" align="center">
                        <p class="m-0 p-0 text-primary">Codigo de Acesso</p>
                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($dado->codigodeacesso); !!}
                        <p class="m-0 p-0" style="font-size: 12px">{{$dado->codigodeacesso}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dados da Turma</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3 bg-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-white">Horários das Aulas</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseCardExample">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-5">
                                                <form action="{{route('aula.store')}}" method="post">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Adicionar Aula
                                                        </div>
                                                        <div class="card-body">
                                                            @csrf
                                                            <input type="hidden" name="id_turma" value="{{$dado->id}}">
                                                            <label>Adicionar</label>
                                                            <label class="mb-0">Titulo</label>
                                                            <input class="form-control" type="text" name="titulo" placeholder="Ex: Aula Treino 1" required>
                                                            <div class="row">
                                                                <div class="col-5 mt-1 mb-1">
                                                                    <label class="mb-0">Dia</label>
                                                                    <select class="form-control" name="dia_semana"  required>
                                                                        <option value="Domingo">Domingo</option>
                                                                        <option value="Segunda">Segunda</option>
                                                                        <option value="Terça">Terça</option>
                                                                        <option value="Quarta">Quarta</option>
                                                                        <option value="Quinta">Quinta</option>
                                                                        <option value="Sexta">Sexta</option>
                                                                        <option value="Sabado">Sabado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-7">
                                                                    <label class="mb-0">Horario</label>
                                                                    <input class="form-control" type="text" placeholder="Ex: 14:00hs às 16:00hs" name="hora_inicio_fim" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <label class="mb-0">Professor</label>
                                                                    <input class="form-control" type="text" placeholder="Ex: Jose da Silva" name="professor" required>
                                                                </div>
                                                                <div class="col-3">
                                                                    <button type="submit" class="btn btn-success w-100 mt-4"><i class="fa fa-save"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="col-7">
                                                <label>Lista de Horarios Cadastrados</label>
                                                <table class="table table-bordered w-100" style="font-size: 12px">
                                                    <thead>
                                                    <tr>
                                                        <td class="p-1">Dia</td>
                                                        <td class="p-1">Titulo</td>
                                                        <td class="p-1">Horário</td>
                                                        <td class="p-1">Professor</td>
                                                        <td class="p-1"></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(\App\AulaModel::all()->where('id_turma', $dado->id) as $aula)
                                                    <tr>
                                                        <td class="p-2">{{$aula->dia_semana}}</td>
                                                        <td class="p-2">{{$aula->titulo}}</td>
                                                        <td class="p-2">{{$aula->hora_inicio_fim}}</td>
                                                        <td class="p-2">{{$aula->professor}}</td>
                                                        <td class="p-2">
                                                            <form action="{{route('aula.destroy', $aula->id)}}" method="post">
                                                                @csrf
                                                                <input name="_method" value="delete" type="hidden">
                                                                <button  class="btn-sm btn-danger p-1 m-1 pl-2 pr-2"><i class="fas fa-fw fa-trash"></i></button>
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

                        <div class="col-6">
                            <div class="card shadow bg-white rounded">
                                <div class="card-header bg-primary text-white">Alunos da Turma</div>
                                <div class="card-body">
                                    <form action="{{route('inseriremturma')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_turma" value="{{$dado->id}}">
                                    <label>Adicionar Aluno</label>
                                       <div class="row">
                                           <div class="col-10">
                                               <select class="form-control w-100" name="id_aluno" required>
                                                   @foreach(\App\AlunosModel::all()->where('turma','') as $alunolist)
                                                       <option value="{{$alunolist->id}}">
                                                           {{$alunolist->nome}} -
                                                           {{$alunolist->email}}
                                                       </option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           <div class="col-2">
                                               <button type="submit" class="btn btn-success w-100"><i class="fa fa-save"></i></button>
                                           </div>
                                       </div>
                                    </form>
                                    <table class="table table-bordered mt-3" width="100%" cellspacing="0">
                                        <tbody style="font-size: 14px">
                                        @foreach(\App\AlunosModel::all()->where('turma', $dado->id) as $aluno)
                                            <tr>
                                                <td class="p-1">
                                                    <span class="text-primary" style="font-size: 16px">{{$aluno->nome}}</span><br>
                                                    {{$aluno->email}}
                                                </td>
                                                <td>
                                                    <a  class="btn btn-sm btn-danger" href="{{route('removerdaturma', $aluno->id)}}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="col-6">
                            <div class="card shadow bg-white rounded">
                                <div class="card-header bg-primary text-white">Exercícios da Turma</div>
                                <div class="card-body">
                                    <form action="{{route('inserirexercicioemturma')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_turma" value="{{$dado->id}}">
                                        <label>Adicionar Exercícios</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <?php
                                                $lt = [];
                                                foreach (\App\ExercicioTurmaModel::select('id_exercicio')->where('id_turma', $dado->id)->get() as $list){
                                                    array_push($lt, $list->id_exercicio );
                                                }
                                                ?>
                                                <select class="form-control w-100" name="id_exercicio" required>
                                                    @foreach(\App\ExercicioModel::all()->whereNotIn('id', $lt) as $exercicio)
                                                        <option value="{{$exercicio->id}}">
                                                            {{$exercicio->titulo}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-success w-100"><i class="fa fa-save"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table table-bordered mt-3" width="100%" cellspacing="0">
                                        <tbody style="font-size: 14px">
                                        @foreach(\App\ExercicioTurmaModel::all()->where('id_turma', $dado->id) as $exercicio)
                                            @foreach($exercicios as $one)
                                                @if($one->id == $exercicio->id_exercicio)

                                                    <tr>
                                                        <td class="p-1">
                                                            <span class="text-primary m-0 p-0" style="font-size: 16px">{{$one->titulo}}</span><br>
                                                            <span class="m-0 p-0" style="font-size: 12px">{{$one->descricao}}</span>
                                                        </td>
                                                        <td align="center" class="p-2">
                                                            <a  class="btn btn-sm btn-danger" href="{{route('removerexerciciodaturma', $exercicio->id)}}"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

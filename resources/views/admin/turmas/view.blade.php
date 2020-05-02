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
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Horários das Aulas</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseCardExample">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-5">
                                                <label>Adicionar</label>
                                                <div class="card p-2">
                                                    <label class="mb-0">Titulo</label>
                                                    <input class="form-control">
                                                    <div class="row">
                                                        <div class="col-5 mt-1 mb-1">
                                                            <label class="mb-0">Dia</label>
                                                            <select class="form-control">
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
                                                            <input class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label class="mb-0">Professor</label>
                                                            <input class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success w-100 mt-4">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <label>Lista de Horarios Cadastrados</label>
                                                <div class="card p-2">
                                                    <table class="table-bordered w-100">
                                                        <thead>
                                                        <tr>
                                                            <td>Dia</td>
                                                            <td>Titulo</td>
                                                            <td>Horário</td>
                                                            <td>Professor</td>
                                                            <td></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Segunda</td>
                                                            <td>Aulas Aquecimento</td>
                                                            <td>14:00 - 16:00</td>
                                                            <td>Jose da Silva</td>
                                                            <td>
                                                                <a href="#" class="btn-sm btn-danger p-0 m-1 pl-1 pr-1">x</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quarta</td>
                                                            <td>Aulas 1</td>
                                                            <td>14:00 - 16:00</td>
                                                            <td>Maria da Silva</td>
                                                            <td>
                                                                <a href="#" class="btn-sm btn-danger p-0 m-1 pl-1 pr-1">x</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sexta</td>
                                                            <td>Aulas 3</td>
                                                            <td>14:00 - 16:00</td>
                                                            <td>Joao da Silva</td>
                                                            <td>
                                                                <a href="#" class="btn-sm btn-danger p-0 m-1 pl-1 pr-1">x</a>
                                                            </td>                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card shadow bg-white rounded">
                                <div class="card-header">Alunos da Turma</div>
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
                                               <button type="submit" class="btn btn-success w-100">+</button>
                                           </div>
                                       </div>
                                    </form>
                                    <table class="table table-bordered mt-3" width="100%" cellspacing="0">
                                        <tbody style="font-size: 14px">
                                        @foreach(\App\AlunosModel::all()->where('turma', $dado->id) as $aluno)
                                            <tr>
                                                <td>
                                                    <span class="text-primary" style="font-size: 16px">{{$aluno->nome}}</span><br>
                                                    {{$aluno->email}}
                                                </td>
                                                <td>
                                                    <a  class="btn btn-sm btn-danger w-100" href="{{route('removerdaturma', $aluno->id)}}">x</a>
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
                                <div class="card-header">Exercícios da Turma</div>
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
                                                <button type="submit" class="btn btn-success w-100">+</button>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table table-bordered mt-3" width="100%" cellspacing="0">
                                        <tbody style="font-size: 14px">
                                        @foreach(\App\ExercicioTurmaModel::all()->where('id_turma', $dado->id) as $exercicio)
                                            @foreach($exercicios as $one)
                                                @if($one->id == $exercicio->id_exercicio)

                                                    <tr>
                                                        <td>
                                                            <span class="text-primary" style="font-size: 16px">{{$one->titulo}}</span><br>
                                                            {{$one->profesor}}
                                                        </td>
                                                        <td>
                                                            <a  class="btn btn-sm btn-danger w-100" href="{{route('removerexerciciodaturma', $exercicio->id)}}">x</a>
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

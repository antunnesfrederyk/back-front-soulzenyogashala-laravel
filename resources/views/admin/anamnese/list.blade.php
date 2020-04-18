@extends('layouts.app')

@section('content')
    @php($alunos = \App\AlunosModel::all())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Cadastrar Anamnese</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample">
                    <div class="card-body p-4">
                        <form method="post" action="{{route('anamneses.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label class="mb-0">Aluno</label>
                                    <select class="form-control" name="id_aluno" required>
                                        @foreach(\App\AlunosModel::select()->whereNotIn('id', \App\AnamneseModel::select('id_aluno'))->get() as $aluno)
                                            <option value="{{$aluno->id}}">{{$aluno->nome}} - {{$aluno->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Peso:</label>
                                    <input class="form-control" type="number" name="peso" placeholder="">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Altura:</label>
                                    <input class="form-control" type="number" name="altura" placeholder="">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Acorda a noite?</label>
                                    <select class="form-control" name="acordaanoite" required>
                                        <option value="Não">Não</option>
                                        <option value="Sim">Sim</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label class="mb-0">Como é seu sono?</label>
                                    <input class="form-control" type="text" name="descricaodesono">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Horário de dormir:</label>
                                    <input class="form-control" type="text" name="horariodedormir">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Água/dia (Lts):</label>
                                    <input class="form-control" type="number" name="litrosdeaguapordia">
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label class="mb-0">Alguma Alergia?</label>
                                    <input class="form-control" type="text" name="alergia">
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label class="mb-0">Pratica Atividade Física?</label>
                                    <input class="form-control" type="text" name="atividadefisica">
                                </div>
{{----}}
                                <div class="form-group col-md-5 col-12">
                                    <label class="mb-0">Alimentação:</label>
                                    <input class="form-control" type="text" name="alimentacao" placeholder="Ex: ">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="mb-0">Como nos conheceu?</label>
                                    <input class="form-control" type="text" name="comonosconheceu" placeholder="">
                                </div>
                                <fieldset class="w-100">
                                    <legend>Saúde Corporal</legend>
                                    <div class="row">
                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Diabetes?</label>
                                            <select class="form-control" name="diabetes" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Dor de Cabeça?</label>
                                            <select class="form-control" name="doresdecabeca" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Dor de Coluna?</label>
                                            <select class="form-control" name="doresdecoluna" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Hipertenso?</label>
                                            <select class="form-control" name="hipertenso" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Evacua frequentemente?</label>
                                            <select class="form-control" name="evacuacao" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8 col-12">
                                            <label class="mb-0">Outros Problemas de Saúde? Quais?</label>
                                            <input class="form-control" type="text" name="problemadesaude" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Cuidados Médicos?</label>
                                            <select class="form-control" name="cuidadomedico" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Toma Medicação?</label>
                                            <select class="form-control" name="medicacao" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8 col-12">
                                            <label class="mb-0">Se sim, quais medicamentos?</label>
                                            <input class="form-control" type="text" name="medicamentos" placeholder="">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="w-100">
                                    <legend>Estado Físico</legend>
                                    <div class="row">
                                        <div class="form-group col-md-3 col-12">
                                            <label class="mb-0">Usa Prótese?</label>
                                            <select class="form-control" name="protese" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label class="mb-0">Limitação em movimento? Quais?</label>
                                            <input class="form-control" type="text" name="limitacaodemovimento" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Lesão ou acometimento?</label>
                                            <input class="form-control" type="text" name="lesaoouacometimento" placeholder="">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="w-100">
                                    <legend>Mais Informações</legend>
                                    <div class="row">

                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Saúde Mental</label>
                                            <input class="form-control" type="text" name="estadomental" placeholder="">
                                        </div>
                                        <div class="form-group col-md-3 col-12">
                                            <label class="mb-0">Profissão</label>
                                            <input class="form-control" type="text" name="profissao" placeholder="">
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label class="mb-0">Como se sente no trabalho?</label>
                                            <input class="form-control" type="text" name="comosesentenotrabalho" placeholder="">
                                        </div>

                                        <div class="form-group col-md-12 col-12">
                                            <label class="mb-0">Fale mais sobre você</label>
                                            <input class="form-control" type="text" name="maissobrevoce" placeholder="">
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Desenvolvimento Pessoal</label>
                                            <input class="form-control" type="text" name="desenvolvimentopessoal" placeholder="">
                                        </div>

                                        <div class="form-group col-md-3 col-12">
                                            <label class="mb-0">Já praticou Yoga?</label>
                                            <select class="form-control" name="yoga" required>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label class="mb-0">Objetivo</label>
                                            <input class="form-control" type="text" name="objetivo" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Contato de Emergência</label>
                                            <input class="form-control" type="text" name="emergenciaavisar" placeholder="">
                                        </div>

                                        <div class="form-group col-md-8 col-12" align="right">
                                            <label class="mb-0">&nbsp;</label><br>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Anamnese de Alunos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome / Email</th>
                                <th>Anamnese</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome / Email / Nascimento</th>
                                <th>Anamnese</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($dados as $dado)
                                <tr>
                                    <td>
                                        @foreach($alunos as $aluno)
                                            @if($aluno->id == $dado->id_aluno)
                                                <span class="text-primary">{{$aluno->nome}}</span><br><span style="font-size: 14px;">{{$aluno->email}}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="#">Visualizar Anamnese</a>
                                    </td>
                                    <td></td>
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

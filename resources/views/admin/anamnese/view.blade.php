@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Detalhamento de Anamnese</h6>
                    @foreach(\App\AlunosModel::all()->where('id', $dado->id_aluno) as $aluno)
                        <h3 class="mb-0">{{$aluno->nome}}</h3>
                    @endforeach
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body p-4">
                        <form method="post" action="{{route('anamneses.update', $dado->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_aluno" value="{{$dado->id_aluno}}">
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Peso:</label>
                                    <input class="form-control" type="number" name="peso" value="{{$dado->peso}}" placeholder="">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Altura:</label>
                                    <input class="form-control" type="number" name="altura" value="{{$dado->altura}}" placeholder="">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Acorda a noite?</label>
                                    <select class="form-control" name="acordaanoite" required>
                                        <option  value="{{$dado->acordaanoite}}">{{$dado->acordaanoite}}</option>
                                        <option value="Não">Não</option>
                                        <option value="Sim">Sim</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label class="mb-0">Como é seu sono?</label>
                                    <input class="form-control" type="text" value="{{$dado->descricaodesono}}" name="descricaodesono">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Horário de dormir:</label>
                                    <input class="form-control" type="text" value="{{$dado->horariodedormir}}" name="horariodedormir">
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label class="mb-0">Água/dia (Lts):</label>
                                    <input class="form-control" type="number" value="{{$dado->litrosdeaguapordia}}" name="litrosdeaguapordia">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="mb-0">Alguma Alergia?</label>
                                    <input class="form-control" type="text" value="{{$dado->alergia}}" name="alergia">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="mb-0">Pratica Atividade Física?</label>
                                    <input class="form-control" type="text" value="{{$dado->atividadefisica}}" name="atividadefisica">
                                </div>
{{----}}
                                <div class="form-group col-md-6 col-12">
                                    <label class="mb-0">Alimentação:</label>
                                    <input class="form-control" type="text" value="{{$dado->alimentacao}}" name="alimentacao" placeholder="Ex: ">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label class="mb-0">Como nos conheceu?</label>
                                    <input class="form-control" type="text" value="{{$dado->comonosconheceu}}" name="comonosconheceu" placeholder="">
                                </div>
                                <fieldset class="w-100">
                                    <legend>Saúde Corporal</legend>
                                    <div class="row">
                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Diabetes?</label>
                                            <select class="form-control" name="diabetes" required>
                                                <option  value="{{$dado->diabetes}}">{{$dado->diabetes}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Dor de Cabeça?</label>
                                            <select class="form-control" name="doresdecabeca" required>
                                                <option  value="{{$dado->doresdecabeca}}">{{$dado->doresdecabeca}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Dor de Coluna?</label>
                                            <select class="form-control" name="doresdecoluna" required>
                                                <option  value="{{$dado->doresdecoluna}}">{{$dado->doresdecoluna}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 col-12">
                                            <label class="mb-0">Hipertenso?</label>
                                            <select class="form-control" name="hipertenso" required>
                                                <option  value="{{$dado->hipertenso}}">{{$dado->hipertenso}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Evacua frequentemente?</label>
                                            <select class="form-control" name="evacuacao" required>
                                                <option  value="{{$dado->evacuacao}}">{{$dado->evacuacao}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8 col-12">
                                            <label class="mb-0">Outros Problemas de Saúde? Quais?</label>
                                            <input class="form-control" type="text" value="{{$dado->problemadesaude}}" name="problemadesaude" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Cuidados Médicos?</label>
                                            <select class="form-control" name="cuidadomedico" required>
                                                <option  value="{{$dado->cuidadomedico}}">{{$dado->cuidadomedico}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Toma Medicação?</label>
                                            <select class="form-control" name="medicacao" required>
                                                <option  value="{{$dado->medicacao}}">{{$dado->medicacao}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8 col-12">
                                            <label class="mb-0">Se sim, quais medicamentos?</label>
                                            <input class="form-control" type="text" value="{{$dado->medicamentos}}" name="medicamentos" placeholder="">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="w-100">
                                    <legend>Estado Físico</legend>
                                    <div class="row">
                                        <div class="form-group col-md-3 col-12">
                                            <label class="mb-0">Usa Prótese?</label>
                                            <select class="form-control" name="protese" required>
                                                <option  value="{{$dado->protese}}">{{$dado->protese}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label class="mb-0">Limitação em movimento? Quais?</label>
                                            <input class="form-control" type="text" value="{{$dado->limitacaodemovimento}}" name="limitacaodemovimento" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Lesão ou acometimento?</label>
                                            <input class="form-control" type="text" value="{{$dado->lesaoouacometimento}}" name="lesaoouacometimento" placeholder="">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="w-100">
                                    <legend>Mais Informações</legend>
                                    <div class="row">

                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Saúde Mental</label>
                                            <input class="form-control" type="text" value="{{$dado->estadomental}}" name="estadomental" placeholder="">
                                        </div>
                                        <div class="form-group col-md-3 col-12">
                                            <label class="mb-0">Profissão</label>
                                            <input class="form-control" type="text" value="{{$dado->profissao}}" name="profissao" placeholder="">
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label class="mb-0">Como se sente no trabalho?</label>
                                            <input class="form-control" type="text" value="{{$dado->comosesentenotrabalho}}" name="comosesentenotrabalho" placeholder="">
                                        </div>

                                        <div class="form-group col-md-12 col-12">
                                            <label class="mb-0">Fale mais sobre você</label>
                                            <input class="form-control" type="text" value="{{$dado->maissobrevoce}}" name="maissobrevoce" placeholder="">
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Desenvolvimento Pessoal</label>
                                            <input class="form-control" type="text" value="{{$dado->desenvolvimentopessoal}}" name="desenvolvimentopessoal" placeholder="">
                                        </div>

                                        <div class="form-group col-md-3 col-12">
                                            <label class="mb-0">Já praticou Yoga?</label>
                                            <select class="form-control" name="yoga" required>
                                                <option  value="{{$dado->yoga}}">{{$dado->yoga}}</option>
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label class="mb-0">Objetivo</label>
                                            <input class="form-control" type="text" value="{{$dado->objetivo}}" name="objetivo" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label class="mb-0">Contato de Emergência</label>
                                            <input class="form-control" type="text" value="{{$dado->emergenciaavisar}}" name="emergenciaavisar" placeholder="">
                                        </div>

                                        <div class="form-group col-md-8 col-12" align="right">
                                            <label class="mb-0">&nbsp;</label><br>
                                            <button type="submit" id="submit" style="display: none" class="btn btn-primary">Atualizar</button>
                                            <button type="button" id="habilita" class="btn btn-primary" onclick="habilitar()">Atualizar Anamnese</button>
                                            <button type="button" id="desabilita" style="display: none" class="btn btn-danger mt-2" onclick="desabilitar()">Cancelar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        var inputs = document.getElementsByTagName("input")
        var selects = document.getElementsByTagName("select")
        var habilita = document.getElementById("habilita")
        var desabilita = document.getElementById("desabilita")
        var submit = document.getElementById("submit")

        desabilitar()

        function habilitar() {
            desabilita.style.display = 'block'
            submit.style.display = 'block'
            habilita.style.display = 'none'
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = false;
            }
            for (var i = 0; i < selects.length; i++) {
                selects[i].disabled = false;
            }
        }

        function desabilitar() {
            desabilita.style.display = 'none'
            submit.style.display = 'none'
            habilita.style.display = 'block'
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = true;
            }
            for (var i = 0; i < selects.length; i++) {
                selects[i].disabled = true;
            }
        }

    </script>
@endsection

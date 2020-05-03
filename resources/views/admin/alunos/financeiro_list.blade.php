@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-primary">{{$aluno->nome}}</h1>
            <p>{{$aluno->email}}</p>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Cadastrar Fatura</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body p-4">

                        <form method="post" action="{{route('financeiro.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_user" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            <input type="hidden" name="id_aluno" value="{{$aluno->id}}">
                            <div class="row">
                                <div class="form-group col-md-3 col-12">
                                    <label class="mb-0">Mês Referência:</label>
                                    <select class="form-control" name="mes_ref">
                                        <option value="Janeiro">Janeiro</option>
                                        <option value="Fevereiro">Fevereiro</option>
                                        <option value="Março">Março</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Maio">Maio</option>
                                        <option value="Junho">Junho</option>
                                        <option value="Julho">Julho</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Setembro">Setembro</option>
                                        <option value="Outubro">Outubro</option>
                                        <option value="Novembro">Novembro</option>
                                        <option value="Dezembro">Dezembro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label class="mb-0">Vencimento:</label>
                                    <input class="form-control" type="date" name="data_venc" placeholder="">
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label class="mb-0">Valor:</label>
                                    <input class="form-control" type="text" name="valor" placeholder="Ex: R$ 100,00">
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <button class="btn btn-primary mt-4 w-100" type="submit">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Faturas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Mês Ref.</th>
                                <th>Vencimento</th>
                                <th>Valor</th>
                                <th>Pago em</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                            @foreach($faturas as $dado)
                                <tr>
                                    <td>{{$dado->mes_ref}}</td>
                                    <td>{{\Carbon\Carbon::parse($dado->data_venc)->format('d/m/Y')}}</td>
                                    <td>{{$dado->valor}}</td>
                                    <td>
                                        @if($dado->data_pag != '')
                                        <span class="btn-success p-0 pl-2 pr-2">{{\Carbon\Carbon::parse($dado->data_pag)->format('d/m/Y')}}</span>
                                        @else
                                            <form action="{{route('financeiro.update', $dado->id)}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input name="_method" value="put" type="hidden">
                                                        <label><span class="btn-warning p-0 pl-2 pr-2">Em Aberto</span> Data de Pagamento:</label>
                                                        <input class="form-control form-control-sm" type="date" name="data_pag" required>
                                                    </div>
                                                    <div class="col-2">
                                                        <button class="btn btn-sm btn-primary" style="margin-top: 28px"><i class="fa fa-save"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($dado->data_pag == '')
                                        <form action="{{route('financeiro.destroy', $dado->id)}}" method="post">
                                            @csrf
                                            <input name="_method" value="delete" type="hidden">
                                            <button  class="btn btn btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                        @else
                                            <span style="font-size: 12px">Fatura Paga<br></span>
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


<div class="modal fade" id="modalimagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Imagem de Fundo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">

                <img id="img" src="" width="30%">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function ver_imgem(id){
        document.getElementById('img').src = id
    }
</script>
@endsection

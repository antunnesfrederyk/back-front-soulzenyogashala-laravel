@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Upload de Áudios de Meditação</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample">
                    <div class="card-body p-4">

                        <form method="post" action="{{route('meditacoes.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-8">
                                    <label class="mb-0">Nome:</label>
                                    <input class="form-control" type="text" name="nome" required>
                                </div>
                                <div class="form-group col-4">
                                    <label class="mb-0">Categoria:</label>
                                    <select class="form-control" type="text" name="categoria" required>
                                        <option selected value="0.0">Triste</option>
                                        <option value="2.5">Ansioso</option>
                                        <option value="5.0">Irritado</option>
                                        <option value="7.5">Sentimental</option>
                                        <option value="10.0">Animado</option>
                                    </select>
                                </div>
                                <div class="form-group col-9">
                                    <label class="mb-0">Audio:</label>
                                    <input class="form-control" type="file" name="audio" required>
                                </div>
                                <div class="form-group col-3" align="right">
                                    <button class="btn btn-primary mt-4 w-100" type="submit">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Áudios de Meditação</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome</th>{{--titulo, descricao, gratuito--}}
                                <th>Audio</th>
                                <th>Categoria</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>{{--titulo, descricao, gratuito--}}
                                <th>Audio</th>
                                <th>Categoria</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody style="font-size: 14px">
                            @foreach($dados as $dado)
                                <tr>
                                    <td>
                                        {{$dado->nome}}
                                    </td>
                                    <td align="center">
                                        <a target="_blank" class="btn btn-sm btn-dark" href="{{$dado->audio}}"><i class="fas fa-fw fa-file-audio"></i>&nbsp;&nbsp;Play</a>
                                    </td>
                                    <td>
                                        @switch($dado->categoria)
                                            @case("0.0")
                                            Triste
                                            @break
                                            @case("2.5")
                                            Ansioso
                                            @break
                                            @case("5.0")
                                            Irritado
                                            @break
                                            @case("7.5")
                                            Sentimental
                                            @break
                                            @case("10.0")
                                            Animado
                                            @break
                                        @endswitch
                                    </td>
                                    <td align="center">
                                        <form action="{{route('meditacoes.destroy', $dado->id)}}" method="post">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Cadastrar Exercício</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample">
                    <div class="card-body p-4">

                        <form method="post" action="{{route('exercicio.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_user" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            <div class="row">
                                <div class="form-group col-md-8 col-12">
                                    <label class="mb-0">Titulo:</label>
                                    <input class="form-control" type="text" name="titulo" placeholder="">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="mb-0">Imagem:</label>
                                    <input class="form-control" type="file" name="imagem">
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label class="mb-0">Descrição:</label>
                                    <textarea class="form-control" rows="3" name="descricao"></textarea>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label class="mb-0">URL Youtube:</label>
                                    <input class="form-control" type="text" name="audio_video" placeholder="Ex: IRirqw082XI">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="mb-0">Duração do Exercício</label>
                                    <input class="form-control" type="text" name="duracao" placeholder="">
                                </div>
                                <div class="form-group col-md-2 col-12" align="center" >
                                    <input class="form-control float-left" type="checkbox" name="gratuito" placeholder="">
                                    <label class="float-left">Gratuito</label>
                                </div>
                                <div class="form-group col-md-12 col-12" align="right">
                                    <button class="btn btn-primary mt-4" type="submit">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Exercícios Cadastrados</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Exercício</th>{{--titulo, descricao, gratuito--}}
                                <th>Duração</th>
                                <th>Audio/Video - Imagem</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Exercício</th>{{--titulo, descricao, gratuito--}}
                                <th>Duração</th>
                                <th>Audio/Video - Imagem</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody style="font-size: 14px">
                            @foreach($dados as $dado)
                                <tr>
                                    <td>
                                        <span class="text-primary" style="font-size: 15px">{{$dado->titulo}}</span><br>
                                        {{$dado->descricao}}<br>
                                        @if($dado->gratuito ==1)
                                            <p class="btn btn-sm btn-success p-0 pl-1 pr-1">Gratuito</p>
                                        @endif
                                    </td>
                                    <td>
                                        {{$dado->duracao}}
                                    </td>
                                    <td>
                                        <a target="_blank" class="btn btn-sm btn-dark" href="{{$dado->audio_video}}"><i class="fas fa-fw fa-video"></i>&nbsp;&nbsp;A/V</a>
                                        <button class="btn btn-sm btn-dark" onclick="ver_imgem('{{asset($dado->imagem)}}')" data-toggle="modal" data-target="#modalimagem"><i class="fas fa-fw fa-image"></i>&nbsp;&nbsp;Imagem</button>
                                    </td>
                                    <td align="center">
                                        <form action="{{route('exercicio.destroy', $dado->id)}}" method="post">
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

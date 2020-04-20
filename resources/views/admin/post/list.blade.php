@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Postar no Feed</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample">
                    <div class="card-body p-4">

                        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
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
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Posts</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Titulo / Descrição</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Imagem</th>
                                <th>Titulo / Descrição</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody style="font-size: 14px">
                            @foreach($dados as $dado)
                                <tr>
                                    <td>
                                        <img src="{{asset($dado->imagem)}}" width="100px">
                                    </td>
                                    <td>
                                        <span class="text-primary" style="font-size: 18px">{{$dado->titulo}}</span><br>
                                        {{$dado->descricao}}
                                    </td>
                                    <td align="center">
                                        <form action="{{route('post.destroy', $dado->id)}}" method="post">
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

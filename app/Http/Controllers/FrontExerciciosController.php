<?php

namespace App\Http\Controllers;

use App\ExercicioModel;
use Illuminate\Http\Request;

class FrontExerciciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dados = ExercicioModel::all();
        return view('admin.exercicios.list', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $exercicio = new ExercicioModel();
        $exercicio->titulo = $request['titulo'];
        $exercicio->descricao = $request['descricao'];
        $exercicio->id_user = $request['id_user'];
        $exercicio->audio_video = $request['audio_video'];
        $exercicio->duracao = $request['duracao'];

        if($request['gratuito']){
            $exercicio->gratuito = true;
        }else{
            $exercicio->gratuito = false;
        }


        $file = $request->file('imagem');
        if ($file !=null){
            $newName = str_replace('.'.$file->getClientOriginalExtension() , '' , strtolower( preg_replace('/[ -]+/' , '_' , strtr(utf8_decode(trim($file->getClientOriginalName())), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")) )).'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('exercicios'), $newName);
            $exercicio->imagem = "exercicios/".$newName;
        }

        $exercicio->save();
        flash('Post inserido com sucesso!')->success();
        return redirect()->route('exercicio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $exercicio = ExercicioModel::findOrFail($id);
        $exercicio->delete();
        flash('Exercício Excluído com Sucesso')->success();
        return  redirect()->route('exercicio.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\MeditacaoModel;
use Illuminate\Http\Request;

class FrontMeditacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = MeditacaoModel::all();
        return view('admin.meditacao.list', compact('dados'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $meditacao = new MeditacaoModel();
        $meditacao->nome = $request['nome'];
        $meditacao->categoria = $request['categoria'];

        $file = $request->file('audio');
        if ($file !=null){
            $newName = str_replace('.'.$file->getClientOriginalExtension() , '' , strtolower( preg_replace('/[ -]+/' , '_' , strtr(utf8_decode(trim($file->getClientOriginalName())), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")) )).'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('meditacao'), $newName);
            $meditacao->audio = "meditacao/".$newName;
        }

        $meditacao->save();
        flash('Upload realizado com sucesso!')->success();
        return redirect()->route('meditacoes.index');
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MeditacaoModel::findOrFail($id);
        if(file_exists($delete->audio)){
            unlink($delete->audio);
        }
        $delete->delete();
        flash('Meditação excluída!')->success();
        return redirect()->route('meditacoes.index');
    }
}

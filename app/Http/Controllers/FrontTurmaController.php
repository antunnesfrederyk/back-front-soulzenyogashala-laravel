<?php

namespace App\Http\Controllers;

use App\ExercicioModel;
use App\TurmaModel;
use Illuminate\Http\Request;

class FrontTurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dados = TurmaModel::all();
        return view('admin.turmas.list', compact('dados'));
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
        $turma = new TurmaModel($request->all());
        $turma->save();
        flash('Turma Cadastrada');
        return redirect()->route('turma.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $dado = TurmaModel::findOrFail($id);
        $exercicios = ExercicioModel::all();
        return view('admin.turmas.view', compact('dado'), compact('exercicios'));
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
        $dado = TurmaModel::findOrFail($id);
        $dado->delete();
        flash('Turma excluída com sucesso!')->success();
        return redirect()->route('turma.index');
    }
}

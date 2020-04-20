<?php

namespace App\Http\Controllers;

use App\AnamneseModel;
use Illuminate\Http\Request;

class FrontAnamneseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $dados = AnamneseModel::all();
        return view('admin.anamnese.list', compact('dados'));
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
        $anamnese = new AnamneseModel($request->all());
        $anamnese->save();
        flash('Anamnese cadastrada com sucesso!')->success();
        return redirect()->route('anamneses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dado = AnamneseModel::findOrFail($id);
        return view('admin.anamnese.view', compact('dado'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $anamnese = AnamneseModel::findOrFail($id);
        $anamnese->update($request->all());
        flash('Anamnese Atualizada com Sucesso')->success();
        return redirect()->route('anamneses.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $anamnase = AnamneseModel::findOrFail($id);
        $anamnase->delete();
        flash('Anamnese Excluída com Sucesso')->success();
        return  redirect()->route('anamneses.index');
    }
}

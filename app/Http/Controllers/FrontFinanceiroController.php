<?php

namespace App\Http\Controllers;

use App\AlunosModel;
use App\FinanceiroModel;
use Illuminate\Http\Request;

class FrontFinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $fatura = new FinanceiroModel($request->all());
        $aluno = $fatura->id_aluno;
        $fatura->save();
        flash('Fatura inserida com sucesso');
        return redirect()->route('financeiro.show', $aluno);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $aluno = AlunosModel::findOrFail($id);
        $faturas = FinanceiroModel::all()->where('id_aluno', $id);
        return view('admin.alunos.financeiro_list', compact('aluno'), compact('faturas'));
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
        $fatura = FinanceiroModel::findOrFail($id);
        $fatura->data_pag = $request['data_pag'];
        $tm = $fatura->id_aluno;
        $fatura->save();
        flash('Pagamento confirmado com sucesso');
        return redirect()->route('financeiro.show', $tm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $fatura = FinanceiroModel::findOrFail($id);
        $tm = $fatura->id_aluno;
        $fatura->delete();
        flash('Fatura Excluida com Sucesso');
        return redirect()->route('financeiro.show', $tm);
    }
}

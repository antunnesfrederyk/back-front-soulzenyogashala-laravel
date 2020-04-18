<?php

namespace App\Http\Controllers;

use App\AlunosModel;
use Illuminate\Http\Request;

class ApiAlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AlunosModel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return AlunosModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AlunosModel
     */
    public function store(Request $request)
    {
        $aluno = new AlunosModel($request->all());
        $aluno->save();
        return $aluno;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return AlunosModel
     */
    public function update(Request $request, $id)
    {
        $aluno = AlunosModel::findOrFail($id);
        $aluno->update($request->all());
        return $aluno;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AlunosModel::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = AlunosModel::findOrFail($id);
        return $aluno->delete();
    }
}

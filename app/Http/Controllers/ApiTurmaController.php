<?php

namespace App\Http\Controllers;

use App\TurmaModel;
use Illuminate\Http\Request;

class ApiTurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TurmaModel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return TurmaModel::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TurmaModel
     */
    public function store(Request $request)
    {
        $turma = new TurmaModel($request->all());
        $turma->codigodeacesso = uniqid();
        $turma->save();
        return $turma;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TurmaModel::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return TurmaModel
     */
    public function update(Request $request, $id)
    {
        $turma = TurmaModel::findOrFail(id);
        $turma->update($request->all());
        return $turma;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = TurmaModel::findOrFail($id);
        return $turma->delete();
    }
}

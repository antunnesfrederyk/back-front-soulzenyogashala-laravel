<?php

namespace App\Http\Controllers;

use App\AgendaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AgendaModel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return AgendaModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AgendaModel
     */
    public function store(Request $request)
    {
        $agenda = new AgendaModel($request->all());
        $agenda->save();
        return $agenda;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return AgendaModel
     */
    public function show($id)
    {
        return AgendaModel::findOrFail($id);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return AgendaModel
     */
    public function update(Request $request, $id)
    {
        $agenda = AgendaModel::findOrFail($id);
        $agenda->update($request->all());
        return $agenda;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = AgendaModel::findOrFail($id);
        return $agenda->delete;
    }
}

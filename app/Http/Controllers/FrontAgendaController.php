<?php

namespace App\Http\Controllers;

use App\AgendaModel;
use App\AnamneseModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dados = AgendaModel::all();
        return view('admin.agenda.list', compact('dados'));
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
        $agenda = new AgendaModel($request->all());
        $agenda->save();
        flash('Evento criado com sucesso!')->success();
        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $dados =  AgendaModel::all()->where('data', '>=', Carbon::now());
        return view('admin.agenda.list_next', compact('dados'));
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
        $agenda = AgendaModel::findOrFail($id);
        $agenda->update($request->all());
        flash('Evento atualizado com sucesso')->success();
        return redirect()->route('agenda.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $agenda = AgendaModel::findOrFail($id);
        $agenda->delete();
        flash('Evento excluído com sucesso')->success();
        return  redirect()->route('agenda.index');
    }
}

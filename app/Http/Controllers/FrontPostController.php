<?php

namespace App\Http\Controllers;

use App\PostModel;
use Illuminate\Http\Request;

class FrontPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dados = PostModel::all();
        return view('admin.post.list', compact('dados'));
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
        $post = new PostModel();
        $post->titulo = $request['titulo'];
        $post->descricao = $request['descricao'];
        $post->id_user = $request['id_user'];
        $file = $request->file('imagem');
        if ($file !=null){
            $newName = str_replace('.'.$file->getClientOriginalExtension() , '' , strtolower( preg_replace('/[ -]+/' , '_' , strtr(utf8_decode(trim($file->getClientOriginalName())), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")) )).'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('posts'), $newName);
            $post->imagem = "posts/".$newName;
        }

        $post->save();
        flash('Post inserido com sucesso!')->success();
        return redirect()->route('post.index');
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
        $post = PostModel::findOrFail($id);
        $post->delete();
        flash('Post Excluído com Sucesso')->success();
        return  redirect()->route('posts.index');
    }
}

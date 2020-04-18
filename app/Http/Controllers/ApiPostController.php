<?php

namespace App\Http\Controllers;

use App\PostModel;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PostModel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        //
        return PostModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PostModel
     */
    public function store(Request $request)
    {
        //
        $post = new PostModel($request->all());
        $post->save();
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return PostModel
     */
    public function show($id)
    {
        return PostModel::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return PostModel
     */
    public function update(Request $request, $id)
    {
        $post = PostModel::findOrFail($id);
        $post->update($request->all());
        return $post;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int 1 if deleted
     */
    public function destroy($id)
    {
        //
        $post = PostModel::findOrFail($id);
        return $post->delete();

    }
}

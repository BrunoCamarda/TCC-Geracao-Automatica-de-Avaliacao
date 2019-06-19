<?php

namespace App\Http\Controllers;

use App\Assunto;
use Illuminate\Http\Request;

class AssuntoController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $assunto = new Assunto;
        $user = auth()->user();
        $assunto->id_user =  $user->id; 
        $assunto->nome = $request->nome;
        $assunto->save();
        return redirect ('/cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function show(Assunto $assunto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function edit(Assunto $assunto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assunto $assunto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assunto $assunto)
    {
        //
    }
}

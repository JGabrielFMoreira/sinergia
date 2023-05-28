<?php

namespace App\Http\Controllers;

use App\Models\BateCaixa as ModelsBateCaixa;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BateCaixa extends Controller
{

    public function index()
    {

        $bate_caixas = ModelsBateCaixa::with('equipe')->get();

        return Inertia::render('BateCaixa/Index', compact('bate_caixas'));


    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $idEquipe = auth()->id();

        $validator = $request->validate([
            'instalacao' => 'required|string ',
            'medidor' => 'required|string',
        
        ]);

        ModelsBateCaixa::create([
            'instalacao' => $validator['instalacao'],
            'medidor' => $validator['medidor'],
            'equipe_id' => $idEquipe,
            'observacao' => $request['observacao'],

        ]);

        BannerMessage::message('Bate caixa registrado');
        return redirect()->route('produtividade_batecaixa.index');
        
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

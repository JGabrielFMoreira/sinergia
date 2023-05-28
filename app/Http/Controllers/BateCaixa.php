<?php

namespace App\Http\Controllers;

use App\Models\BateCaixa as ModelsBateCaixa;
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
        //
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

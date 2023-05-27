<?php

namespace App\Http\Controllers;

use App\Models\EstruturaEquipe;
use App\Models\Material;
use App\Models\MaterialRecebido as ModelsMaterialRecebido;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MaterialRecebido extends Controller
{

    public function index()
    {

       $recebidos = ModelsMaterialRecebido::with('equipe', 'material')->get();

       $materiais = Material::all(); 
       $equipes = EstruturaEquipe::all();
       return Inertia::render('Materiais/Recebido/Index', compact('equipes', 'materiais', 'recebidos'));


    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'equipe' => 'required | int ',
            'material' => 'required | int',
            'data_entrega' => 'required | date',
            'quantidade' => 'required | int',
        ]);

        ModelsMaterialRecebido::create([

            'equipe_id' => $validator['equipe'],
            'material_id' => $validator['material'],
            'data_entrega' => $validator['data_entrega'],
            'quantidade' => $validator['quantidade'],

        ]);

        BannerMessage::message('Material Registrado');
        return redirect()->route('material_recebido.index');

    }


    public function show($id)
    {
        $recebido = ModelsMaterialRecebido::with('equipe', 'material')->find($id);
    
        return Inertia::render('Materiais/Recebido/Show', compact('recebido'));
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

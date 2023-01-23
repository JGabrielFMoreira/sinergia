<?php

namespace App\Http\Controllers;

use App\Models\EstruturaEquipe;
use App\Models\MedidorEquipe;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipeSaldoMedidores extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];


        if ($pesquisa === null) {

            $medidores =  MedidorEquipe::with('equipe')->where('status', 'DISPONÍVEL')
                ->orderByDesc('id')
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });

            return Inertia::render('Medidores/Saldo/Index', compact('medidores'));
        }

        $pesquisa_equipe = EstruturaEquipe::where('name', $pesquisa)->first();

        if ($pesquisa_equipe === null) {

            $medidores = MedidorEquipe::with('equipe')->where('status', 'DISPONÍVEL')
                ->orderByDesc('id')
                ->where('numero', $pesquisa)
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
                
            return Inertia::render('Medidores/Saldo/Index', compact('medidores'));
        }

        $equipes = EstruturaEquipe::where('status', 'ATIVO')->where('status', 'DISPONÍVEL')->orderBy('name')->get();
        $medidores = MedidorEquipe::with('equipe')
            ->orderByDesc('id')
            ->where('status', 'DISPONÍVEL')
            ->where('numero', $pesquisa)
            ->orWhere('equipe_id', $pesquisa_equipe->id)
            ->where('status', 'DISPONÍVEL')
            ->paginate(50)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });

        return Inertia::render('Medidores/Saldo/Index', compact('medidores'));
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

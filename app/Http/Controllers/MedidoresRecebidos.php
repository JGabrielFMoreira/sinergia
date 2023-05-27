<?php

namespace App\Http\Controllers;

use App\Models\EstruturaEquipe;
use App\Models\MedidorEntrega;
use App\Models\MedidorEquipe;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MedidoresRecebidos extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];

        if ($pesquisa === null) {

            $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('name')->get();
            $entregas = MedidorEntrega::with('equipe.fiscal')
                ->orderByDesc('id')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });

                

            return Inertia::render('Medidores/Recebido/Index', compact('entregas', 'equipes'));

        }

        $pesquisa_equipe = EstruturaEquipe::where('equipe', $pesquisa)->first();

        $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('name')->get();
        $entregas = MedidorEntrega::with('equipe.fiscal')
            ->orderByDesc('id')
            ->where('equipe_id', $pesquisa_equipe->id)
            ->paginate(15)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });

        return Inertia::render('Medidores/Recebido/Index', compact('entregas', 'equipes'));
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        BannerMessage::message('Você informou um medidor que já está cadastrado.', 'danger');
        $validator = $request->validate([

            'medidor_1' => 'required|unique:medidor_equipes,numero',
            'tipo' => 'required|string',
            'equipe' => 'required|int',
            'date' => 'required|date',
            'medidor_2' => 'unique:medidor_equipes,numero',
            'medidor_3' => 'unique:medidor_equipes,numero',
            'medidor_4' => 'unique:medidor_equipes,numero',
            'medidor_5' => 'unique:medidor_equipes,numero',
            'medidor_6' => 'unique:medidor_equipes,numero',
            'medidor_7' => 'unique:medidor_equipes,numero',
            'medidor_8' => 'unique:medidor_equipes,numero',
            'medidor_9' => 'unique:medidor_equipes,numero',
            'medidor_10' => 'unique:medidor_equipes,numero',
            'medidor_11' => 'unique:medidor_equipes,numero',
            'medidor_12' => 'unique:medidor_equipes,numero',

        ]);



        if ($validator['medidor_1'] != null) {

            $qtd_medidores = 1;
        }
        if ($validator['medidor_2'] != null) {

            $qtd_medidores = 2;
        }
        if ($validator['medidor_3'] != null) {

            $qtd_medidores = 3;
        }
        if ($validator['medidor_4'] != null) {

            $qtd_medidores = 4;
        }
        if ($validator['medidor_5'] != null) {

            $qtd_medidores = 5;
        }
        if ($validator['medidor_6'] != null) {

            $qtd_medidores = 6;
        }
        if ($validator['medidor_7'] != null) {

            $qtd_medidores = 7;
        }
        if ($validator['medidor_8'] != null) {

            $qtd_medidores = 8;
        }
        if ($validator['medidor_9'] != null) {

            $qtd_medidores = 9;
        }
        if ($validator['medidor_10'] != null) {

            $qtd_medidores = 10;
        }
        if ($validator['medidor_11'] != null) {

            $qtd_medidores = 11;
        }
        if ($validator['medidor_12'] != null) {

            $qtd_medidores = 12;
        }


        $entrega = MedidorEntrega::Create([
            'equipe_id' => $validator['equipe'],
            'data_entrega' => $validator['date'],
            'medidores_recebidos' => $qtd_medidores,
            'tipo_medidor' => $validator['tipo'],

        ]);

        if ($validator['medidor_1'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_1'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_2'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_2'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_3'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_3'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_4'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_4'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        } 
        if ($validator['medidor_5'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_5'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_6'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_6'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_7'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_7'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_8'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_8'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_9'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_9'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_10'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_10'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_11'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_11'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_12'] != null) {

            MedidorEquipe::Create([
                'medidor_entrega_id' => $entrega->id,
                'numero' => $validator['medidor_12'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }

        BannerMessage::message('Medidores Entregues');
        return redirect()->route('medicao_recebido.index');
    }   


    public function show($id)
    {

        $entrega = MedidorEntrega::find($id);
        $medidores = MedidorEquipe::with('equipe', 'entrega')->where('medidor_entrega_id', $id)->get();

        return Inertia::render('Medidores/Recebido/Show', compact('medidores', 'entrega'));

    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'medidor' => 'required|int',
            'novo_medidor' => 'required|string',

        ]);

        $medidor = MedidorEquipe::with('equipe', 'entrega')->where('medidor_entrega_id', $id,)
        ->where('id', $validator['medidor'])->first();


        $consulta_medidor = MedidorEquipe::with('equipe', 'entrega')->where('numero', $validator['novo_medidor'])->first();


        if($consulta_medidor != null){

            BannerMessage::message('Número de medidor informado já foi entregue.', 'danger');
            return redirect()->route('medicao_recebido.show', $id);
            exit();

        }

        

        if($medidor->status != 'DISPONÍVEL'){

            BannerMessage::message('Medidor não está disponível.', 'danger');
            return redirect()->route('medicao_recebido.show', $id);
            exit();

        }

        $medidor->numero = $validator['novo_medidor'];
        $medidor->save();
        BannerMessage::message('Número do medidor editado');
        return redirect()->route('medicao_recebido.show', $id);
       
    }


    public function destroy($id)
    {
                
                $status_medidores = MedidorEquipe::where('medidor_entrega_id', $id)->where('status', 'INSTALADO')->first();

                if($status_medidores != null){

                    BannerMessage::message('Essa lista contém medidores já instalados.', 'danger');
                    return redirect()->route('medicao_recebido.show', $id);
                    exit();
        
                }

                MedidorEquipe::where('medidor_entrega_id', $id)->delete();



                MedidorEntrega::findOrFail($id)->delete(); 
                BannerMessage::message('Medidores excluídos.');
                return redirect()->route('medicao_recebido.index', $id);

    }
}

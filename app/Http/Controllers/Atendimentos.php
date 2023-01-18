<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\EstruturaEquipe;
use App\Services\BannerMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Atendimentos extends Controller
{

    public function index(Request $request)
    {
        
        $pesquisa = $request['pesquisar'];
        
       
        if ($pesquisa === null) {
            $equipes = EstruturaEquipe::where('status', 'ATIVO')->where('empresa_id', auth()->user()->empresa_id)->orderBy('name')->get();
            $atendimentos = Atendimento::with('equipe', 'user')
                ->orderByDesc('created_at')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
                
            return Inertia::render('Atendimentos/Index', compact('atendimentos', 'equipes'));
        }
    
        $pesquisa_equipe = EstruturaEquipe::where('name', $pesquisa)->first();


        if($pesquisa_equipe === null){
            $equipes = EstruturaEquipe::where('status', 'ATIVO')->where('empresa_id', auth()->user()->empresa_id)->orderBy('name')->get();
            $atendimentos = Atendimento::with('equipe', 'user')
                ->where('uc_atendida', $pesquisa)
                ->orderByDesc('created_at')
                ->paginate(50);
    
            return Inertia::render('Atendimentos/Index', compact('atendimentos', 'equipes'));
        }
        
        $equipes = EstruturaEquipe::where('status', 'ATIVO')->where('empresa_id', auth()->user()->empresa_id)->orderBy('name')->get();
        $atendimentos = Atendimento::with('equipe', 'user')
            ->where('uc_atendida', $pesquisa)
            ->orWhere('equipe_id', $pesquisa_equipe->id)
            ->orderByDesc('created_at')
            ->paginate(50);

        
        return Inertia::render('Atendimentos/Index', compact('atendimentos', 'equipes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'equipe' => 'required | int ',
            'uc' => 'required | string',

        ]);

        $idUsuario = auth()->id();
        


        $primeira_consulta = Atendimento::whereDate('created_at', Carbon::today())->where('equipe_id', $validator['equipe'])->get();

        $primeira = "NAO";

        if (count($primeira_consulta) === 0) {
            $primeira = "SIM";
        }

        Atendimento::create([
            'atendente_id' => $idUsuario,
            'equipe_id' => $validator['equipe'],
            'uc_atendida' => $validator['uc'],
            'primeira_consulta' => $primeira

        ]);
        BannerMessage::message('Atendimento registrado');
        return redirect()->route('atendimentos.index');
    }


    public function show($id)
    {
        $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('name')->get();
        $atendimento = Atendimento::with('equipe', 'user')->find($id);
        return Inertia::render('Atendimentos/Show', compact('atendimento', 'equipes'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'equipe_id' => 'required|int',
            'uc_atendida' => 'required|string',
        ]);

        $atendimento = Atendimento::find($id);

        $atendimento->equipe_id = $validator['equipe_id'];
        $atendimento->uc_atendida = $validator['uc_atendida'];

        $atendimento->save();

        BannerMessage::message('Atendimento editado');
        return redirect()->route('atendimentos.show', $id);
    }


    public function destroy($id)
    {
        Atendimento::findOrFail($id)->delete();
        BannerMessage::message('Atendimento excluído.');
        return redirect()->route('atendimentos.index');
    }
}

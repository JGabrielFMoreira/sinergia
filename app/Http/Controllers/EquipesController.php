<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\EstruturaEquipe;
use App\Models\EstruturaFiscal;
use App\Models\EstruturaSupervisor;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipesController extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];

        if ($pesquisa === null) {

            $empresas = Empresa::all();
            $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
            $fiscais = EstruturaFiscal::where('status', 'ATIVO')->get();
            $equipes = EstruturaEquipe::with('fiscal', 'supervisor', 'empresa')->orderBy('name')
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });;
            return Inertia::Render('Estrutura/Equipes/Index', compact('equipes', 'fiscais', 'supervisores', 'empresas'));
        }



        $pesquisa_fiscal = EstruturaFiscal::where('name', $pesquisa)->first();
        $pesquisa_supervisor = EstruturaSupervisor::where('name', $pesquisa)->first();




        if ($pesquisa_fiscal === null and $pesquisa_supervisor != null) {
            
            $empresas = Empresa::all();
            $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
            $fiscais = EstruturaFiscal::where('status', 'ATIVO')->get();
            $equipes = EstruturaEquipe::with('fiscal', 'supervisor', 'empresa')
                ->orderBy('name')
                ->where('name', $pesquisa)
                ->orWhere('supervisor_id', $pesquisa_supervisor->id)
                ->orWhere('status', $pesquisa)
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });;
            return Inertia::Render('Estrutura/Equipes/Index', compact('equipes', 'fiscais', 'supervisores', 'empresas'));
        }


        if ($pesquisa_fiscal != null and $pesquisa_supervisor === null) {

            $empresas = Empresa::all();
            $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
            $fiscais = EstruturaFiscal::where('status', 'ATIVO')->get();
            $equipes = EstruturaEquipe::with('fiscal', 'supervisor', 'empresa')
                ->orderBy('name')
                ->where('name', $pesquisa)
                ->orWhere('fiscal_id', $pesquisa_fiscal->id)
                ->orWhere('status', $pesquisa)
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });;
            return Inertia::Render('Estrutura/Equipes/Index', compact('equipes', 'fiscais', 'supervisores', 'empresas'));
        }

        $empresas = Empresa::all();
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscais = EstruturaFiscal::where('status', 'ATIVO')->get();
        $equipes = EstruturaEquipe::with('fiscal', 'supervisor', 'empresa')
            ->orderBy('name')
            ->where('name', $pesquisa)
            ->orWhere('status', $pesquisa)
            ->paginate(50)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });;
        return Inertia::Render('Estrutura/Equipes/Index', compact('equipes', 'fiscais', 'supervisores', 'empresas'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        
        BannerMessage::message('O valor informado já está em uso ou não atinge o tamanho valido.', 'danger');
        $validator = $request->validate([
            'name' => 'required|min:8|max:8|unique:estrutura_equipes,name',
            'fiscal' => 'required|int',
            'supervisor' => 'required|int',
            'empresa' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',
        ]);

        EstruturaEquipe::Create([
            'name' => $validator['name'],
            'fiscal_id' => $validator['fiscal'],
            'supervisor_id' => $validator['supervisor'],
            'empresa_id' => $validator['empresa'],
            'regional' => $validator['regional'],
            'status' => $validator['status'],
        ]);

        BannerMessage::message('Equipe Cadastrada');
        return redirect()->route('equipes.index');
    }


    public function show($id)
    {
        $empresas = Empresa::all();
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscais = EstruturaFiscal::where('status', 'ATIVO')->get();
        $equipe = EstruturaEquipe::with('supervisor', 'fiscal', 'empresa')->find($id);
        return Inertia::render('Estrutura/Equipes/Show', compact('equipe', 'fiscais', 'supervisores', 'empresas'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        BannerMessage::message('O valor informado já está em uso ou não atinge o tamanho valido.', 'danger');
        $validator = $request->validate([
            
            'name' => 'required|min:8|max:8',
            'fiscal_id' => 'required|int',
            'supervisor_id' => 'required|int',
            'empresa_id' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',

        ]);

        $equipe = EstruturaEquipe::find($id);


        $equipe->name = $validator['name'];
        $equipe->fiscal_id = $validator['fiscal_id'];
        $equipe->supervisor_id = $validator['supervisor_id'];
        $equipe->empresa_id = $validator['empresa_id'];
        $equipe->regional = $validator['regional'];
        $equipe->status = $validator['status'];
        $equipe->save();

        BannerMessage::message('Equipe Editada');
        return redirect()->route('equipes.show', $id);
    }


    public function destroy($id)
    {
        EstruturaEquipe::findOrFail($id)->delete();
        BannerMessage::message('Equipe Excluída.');
        return redirect()->route('equipes.index', $id);
    }
}

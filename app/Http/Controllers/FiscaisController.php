<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\EstruturaFiscal;
use App\Models\EstruturaSupervisor;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FiscaisController extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];


        if ($pesquisa === null) {

            $empresas = Empresa::all();
            $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
            $fiscais = EstruturaFiscal::with('supervisor', 'empresa')
                ->orderBy('id')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
            return Inertia::render('Estrutura/Fiscais/Index', compact('fiscais', 'supervisores', 'empresas'));
        }

        $pesquisa_supervisor = EstruturaSupervisor::where('name', $pesquisa)->first();

        if ($pesquisa_supervisor === null) {

            $empresas = Empresa::all();
            $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
            $fiscais = EstruturaFiscal::with('supervisor', 'empresa')
                ->orderBy('id')
                ->where('name', $pesquisa)
                ->orWhere('status', $pesquisa)
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
            return Inertia::render('Estrutura/Fiscais/Index', compact('fiscais', 'supervisores', 'empresas'));
        }

        $empresas = Empresa::all();
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscais = EstruturaFiscal::with('supervisor', 'empresa')
            ->orderBy('id')
            ->where('name', $pesquisa)
            ->orWhere('status', $pesquisa)
            ->orWhere('supervisor_id', $pesquisa_supervisor->id)
            ->paginate(15)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });
        return Inertia::render('Estrutura/Fiscais/Index', compact('fiscais', 'supervisores','empresas'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        BannerMessage::message('O valor informado para fiscal já está em uso.', 'danger');
        $validator = $request->validate([
            'nome' => 'required|unique:estrutura_fiscals,name',
            'supervisor' => 'required|int',
            'empresa' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',
        ]);

        EstruturaFiscal::Create([
            'name' => $validator['nome'],
            'supervisor_id' => $validator['supervisor'],
            'empresa_id' =>$validator['empresa'],
            'regional' =>$validator['regional'],
            'status' => $validator['status'],

        ]);

        BannerMessage::message('Fiscal Cadastrado');
        return redirect()->route('fiscais.index');
    }


    public function show($id)
    {
        $empresas = Empresa::all();
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscal = EstruturaFiscal::with('supervisor', 'empresa')->find($id);
        return Inertia::render('Estrutura/Fiscais/Show', compact('fiscal', 'supervisores', 'empresas'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'supervisor_id' => 'required|int',
            'empresa_id' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',
        ]);

        $fiscal = EstruturaFiscal::find($id);

/*
        if ($validator['status'] === 'INATIVO' and $fiscal->equipes()->exists()) {
            BannerMessage::message('Fiscal não pode ser Inativado.', 'danger');
            return redirect()->route('estrutura_fiscal.show', $id);
            exit();
        }
*/
        $fiscal->name = $validator['name'];
        $fiscal->supervisor_id = $validator['supervisor_id'];
        $fiscal->empresa_id = $validator['empresa_id'];
        $fiscal->regional = $validator['regional'];
        $fiscal->status = $validator['status'];
        $fiscal->save();

        BannerMessage::message('Fiscal Editado');
        return redirect()->route('fiscais.show', $id);
    }


    public function destroy($id)
    {

/*
        $fiscal = EstruturaFiscal::find($id);
        
        if ($fiscal->equipes()->exists()) {

            BannerMessage::message('Fiscal não pode ser excluído.', 'danger');
            return redirect()->route('estrutura_fiscal.show', $id);
        }
*/
        EstruturaFiscal::findOrFail($id)->delete();
        BannerMessage::message('Fiscal Excluído.');
        return redirect()->route('fiscais.index', $id);
    }
}

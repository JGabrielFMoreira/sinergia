<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\EstruturaSupervisor;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupervisoresController extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];

        if ($pesquisa === null) {

            $empresas = Empresa::all();
            $supervisores = EstruturaSupervisor::with('users', 'empresa')->orderBy('id')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
            return Inertia::render('Estrutura/Supervisores/Index', compact('supervisores', 'empresas'));
        }

        $empresas = Empresa::all();
        $supervisores = EstruturaSupervisor::with('users', 'empresa')->orderBy('id')
            ->where('name', $pesquisa)
            ->orWhere('status', $pesquisa)
            ->paginate(15)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });
        return Inertia::render('Estrutura/Supervisores/Index', compact('supervisores', 'empresas'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        BannerMessage::message('O valor informado para supervisor já está em uso.', 'danger');
        $validator = $request->validate([
            'nome' => 'required|unique:estrutura_supervisors,name',
            'empresa' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',
        ]);

        EstruturaSupervisor::Create([
            'name' => $validator['nome'],
            'empresa_id' => $validator['empresa'],
            'regional' => $validator['regional'],
            'status' => $validator['status'],

        ]);

        BannerMessage::message('Supervisor Cadastrado');
        return redirect()->route('supervisores.index');
    }


    public function show($id)
    {
        $empresas = Empresa::all();
        $supervisor = EstruturaSupervisor::with('empresa')->find($id);
        return Inertia::render('Estrutura/Supervisores/Show', compact('supervisor', 'empresas'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'name' => 'required|string',
            'empresa_id' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',

        ]);
        

        $supervisor = EstruturaSupervisor::find($id);

        /*
        if ($validator['status'] === 'INATIVO' and $supervisor->encarregados()->exists()) {
            BannerMessage::message('Supervisor não pode ser Inativado.', 'danger');
            return redirect()->route('estrutura_supervisor.show', $id);
            exit();
        }
        */


        $supervisor->name = $validator['name'];
        $supervisor->empresa_id = $validator['empresa_id'];
        $supervisor->regional = $validator['regional'];
        $supervisor->status = $validator['status'];
        $supervisor->save();

        BannerMessage::message('Supervisor Editado');
        return redirect()->route('supervisores.show', $id);
    }


    public function destroy($id)
    {
        $supervisor = EstruturaSupervisor::find($id);

        /*
        if ($supervisor->encarregados()->exists()) {

            BannerMessage::message('Supervisor não pode ser excluído.', 'danger');
            return redirect()->route('estrutura_supervisor.show', $id);
        }
        */

        EstruturaSupervisor::findOrFail($id)->delete();
        BannerMessage::message('Supervisor Excluído.');
        return redirect()->route('supervisores.index', $id);
    }
}

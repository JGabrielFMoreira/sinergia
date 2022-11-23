<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use App\Models\UserCategoria;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];


        if ($pesquisa === null) {
            $empresas = Empresa::all();
            $tipos = UserCategoria::all();
            $usuarios = User::with('categoria', 'empresa')
                ->orderBy('created_at')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
            return Inertia::render('Usuarios/Index', compact('usuarios', 'tipos', 'empresas'));
        }

        $pesquisa_categoria = UserCategoria::where('descricao', $pesquisa)->first();

        if ($pesquisa_categoria === null) {

            $empresas = Empresa::all();
            $tipos = UserCategoria::all();
            $usuarios = User::with('categoria', 'empresa')
                ->where('name', $pesquisa)
                ->orWhere('matricula', $pesquisa)
                ->orderBy('created_at')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
            return Inertia::render('Usuarios/Index', compact('usuarios', 'tipos', 'empresas'));
        }


        $empresas = Empresa::all();
        $tipos = UserCategoria::all();
        $usuarios = User::with('categoria', 'empresa')
            ->where('name', $pesquisa)
            ->orWhere('matricula', $pesquisa)
            ->orWhere('categoria_id', $pesquisa_categoria->id)
            ->orderBy('created_at')
            ->paginate(15)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });
        return Inertia::render('Usuarios/Index', compact('usuarios', 'tipos', 'empresas'));
    }


    public function create(Request $request)
    {
        //
    }


    public function store(Request $request)
    {
        BannerMessage::message('O valor informado para usuário já está em uso.', 'danger');
        $validator = $request->validate([
            'nome' => 'required|string',
            'matricula' => 'required|string|unique:users,matricula',
            'password' => 'required|string',
            'tipo' => 'required|int',
            'empresa' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',

        ]);

        User::Create([
            'name' => $validator['nome'],
            'matricula' => $validator['matricula'],
            'password' =>  Hash::make($validator['password']),
            'categoria_id' => $validator['tipo'],
            'empresa_id' => $validator['empresa'],
            'regional' => $validator['regional'],
            'status' => $validator['status'],
        ]);
        BannerMessage::message('Usuário criado');
        return redirect()->route('usuarios.index');
    }


    public function show($id)
    {
        $empresas = Empresa::all();
        $tipos = UserCategoria::all();
        $usuario = User::with('categoria', 'empresa')->find($id);

        return Inertia::render('Usuarios/Show', compact('usuario', 'tipos', 'empresas'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'matricula' => 'required|string',
            'password' => 'required',
            'categoria_id' => 'required|int',
            'empresa_id' => 'required|int',
            'regional' => 'required|string',
            'status' => 'required|string',
            
        ]);

        $usuario = User::find($id);


        if($validator['password'] != $usuario->password){

            $usuario->password = hash::make($validator['password']);

        }

        $usuario->name = $validator['name'];
        $usuario->matricula = $validator['matricula'];
        $usuario->categoria_id = $validator['categoria_id'];
        $usuario->empresa_id = $validator['empresa_id'];
        $usuario->regional = $validator['regional'];
        $usuario->status = $validator['status'];

        $usuario->save();
        BannerMessage::message('Usuário Editado');
        return redirect()->route('usuarios.show', $id);
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        BannerMessage::message('Usuário Excluído.');
        return redirect()->route('usuarios.index', $id);
    }
}

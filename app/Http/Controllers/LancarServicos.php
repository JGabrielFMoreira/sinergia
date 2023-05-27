<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Material;
use App\Models\MedidorEquipe;
use App\Models\ProdutividadeServico;
use App\Models\TipoServico;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LancarServicos extends Controller
{

    public function index()
    {       
        $servicos = ProdutividadeServico::with('equipe.fiscal', 'codigo', 'tipo_servico')->get();
        $materiais = Material::all();
        $medidores = MedidorEquipe::all();
        $tipos_servicos = TipoServico::all();
        $codigos = Codigo::all();
        return Inertia::render('LancarServicos/Index', compact('codigos', 'tipos_servicos', 'medidores', 'materiais', 'servicos'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $idEquipe = auth()->id();

        $validator = $request->validate([
            'instalacao' => 'required|string',
            'data_execucao' => 'required|date',
            'codigo' => 'required|int',
            'tipo_servico' => 'required|int',
            'medidor_instalado' => 'required|int',
            'material_aplicado' => 'required|int',
            'quantidade' => 'required|int',
        ]);

        ProdutividadeServico::Create([
            'equipe_id' => $idEquipe,
            'instalacao' => $validator['instalacao'],
            'data_execucao' => $validator['data_execucao'],
            'codigo_id' => $validator['codigo'],
            'tipo_servico_id' => $validator['tipo_servico'],
            'valor_ups' => 11,
            'medidor_instalado' => $validator['medidor_instalado'],
            'tipo_ramal' => $validator['material_aplicado'],
            'quantidade_aplicada' => $validator['quantidade'],

        ]);

        BannerMessage::message('Serviço registrado');
        return redirect()->route('produtividade_servico.index');

    }


    public function show($id)
    {
        
        $codigos = Codigo::all();
        $medidores = MedidorEquipe::all();
        $tipos_servicos = TipoServico::all();
        $materiais = Material::all();


        $servico = ProdutividadeServico::with('equipe.fiscal', 'codigo', 'tipo_servico')->find($id);
        $medidor = MedidorEquipe::where('id', $servico->medidor_instalado)->first();
        $numero_medidor = $medidor->numero;
        $material = Material::where('id', $servico->tipo_ramal)->first();
        $nome_material = $material->descricao_material;


        return Inertia::render('LancarServicos/Show', compact('servico', 'numero_medidor', 'nome_material', 'codigos', 'tipos_servicos', 'medidores', 'materiais'));

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
       // dd($request->all());

        $validator = $request->validate([
            'instalacao' => 'required|',
            'codigo_id' => 'required|',
            'tipo_servico_id' => 'required|',
            'medidor_instalado' => 'required|',
            'tipo_ramal' => 'required|',
            'quantidade_aplicada' => 'required|',
        ]);

         $servico = ProdutividadeServico::find($id);
        
         $servico->instalacao = $validator['instalacao'];
         $servico->codigo_id = $validator['codigo_id'];
         $servico->tipo_servico_id = $validator['tipo_servico_id'];
         $servico->medidor_instalado = $validator['medidor_instalado'];
         $servico->tipo_ramal = $validator['tipo_ramal'];
         $servico->quantidade_aplicada = $validator['quantidade_aplicada'];

         $servico->save();

         BannerMessage::message('Serviço editado');
         return redirect()->route('produtividade_servico.show', $id);

    }

    public function destroy($id)
    {
        //
    }
}

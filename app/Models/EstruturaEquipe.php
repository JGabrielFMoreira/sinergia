<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstruturaEquipe extends Model
{

    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'id');
    }

    public function servicos()
    {
        return $this->hasMany(ProdutividadeServico::class);
    }

    public function batecaixa()
    {
        return $this->hasMany(BateCaixa::class);
    }

    public function material_entregues()
    {
        return $this->hasMany(MaterialRecebido::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function fiscal()
    {
        return $this->belongsTo(EstruturaFiscal::class, 'fiscal_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(EstruturaSupervisor::class);
    }

    public function medidor_entregas()
    {
        return $this->hasMany(MedidorEntrega::class);
    }

    public function medidor_equipes()
    {
        return $this->hasMany(MedidorEquipes::class);
    }

}

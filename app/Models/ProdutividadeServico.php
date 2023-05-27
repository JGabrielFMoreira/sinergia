<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutividadeServico extends BaseModel
{
    use HasFactory;
    protected $guarded = [];

    public function equipe()
    {
        return $this->belongsTo(EstruturaEquipe::class);
    }

    public function codigo()
    {
        return $this->belongsTo(Codigo::class);
    }

    public function tipo_servico()
    {
        return $this->belongsTo(TipoServico::class);
    }




}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function servicos()
    {
        return $this->hasMany(ProdutividadeServico::class);
    }

}

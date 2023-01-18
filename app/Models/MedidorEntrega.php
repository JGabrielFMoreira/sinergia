<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedidorEntrega extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function equipe(){

        return $this->belongsTo(EstruturaEquipe::class, 'equipe_id', 'id');
    }

    public function medidor_equipes()
    {
        return $this->hasMany(MedidorEquipes::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedidorEquipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function equipe(){
        return $this->belongTo(EstruturaEquipe::class, 'equipe_id', 'id');
    }

    public function medidor_entrega(){
        return $this->belongTo(EstruturaEquipe::class);
    }

}

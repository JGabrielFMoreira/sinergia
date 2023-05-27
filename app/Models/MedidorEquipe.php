<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedidorEquipe extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function equipe(){
        return $this->belongsTo(EstruturaEquipe::class, 'equipe_id', 'id');
    }

    public function entrega(){
        return $this->belongsTo(MedidorEntrega::class, 'medidor_entrega_id', 'id');
    }



}

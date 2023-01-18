<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends BaseModel
{




    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'atendente_id', 'id');
    }

    public function equipe()
    {
        return $this->belongsTo(EstruturaEquipe::class, 'equipe_id', 'id');
    }


}

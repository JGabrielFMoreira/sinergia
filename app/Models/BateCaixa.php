<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BateCaixa extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function equipe()
    {
        return $this->belongsTo(EstruturaEquipe::class);
    }

}

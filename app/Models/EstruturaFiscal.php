<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstruturaFiscal extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(EstruturaSupervisor::class);
    }


}

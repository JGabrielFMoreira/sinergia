<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstruturaSupervisor extends Model
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

    public function fiscais()
    {
        return $this->hasMany(EstruturaFiscal::class, 'supervisor_id', 'id');
    }

}

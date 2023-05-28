<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BaseModel extends Model
{
    public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y H:i:s') ; //Change the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y'); //Change the format to whichever you desire
    }

    public function getDataEntregaAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y'); //Change the format to whichever you desire
    }

    public function getDataExecucaoAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y'); //Change the format to whichever you desire
    }


}

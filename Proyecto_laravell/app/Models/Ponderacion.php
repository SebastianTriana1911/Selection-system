<?php

namespace App\Models;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ponderacion extends Model{
    use HasFactory;

    protected $table = 'ponderaciones';


    public function postulacion(): HasOne{
        return $this -> hasOne(Postulacion::class);
    }
}

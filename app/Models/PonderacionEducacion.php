<?php

namespace App\Models;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PonderacionEducacion extends Model{
    use HasFactory;

    protected $table = 'ponderacion_educaciones';
    protected $guarded =[];


    public function postulacion(): HasOne{
        return $this -> hasOne(Postulacion::class);
    }
}

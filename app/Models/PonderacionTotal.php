<?php

namespace App\Models;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PonderacionTotal extends Model
{
    use HasFactory;

    protected $table = 'ponderacion_totales';

    protected $guarded =[];

    public function postulacion():BelongsTo{
        return $this->belongsTo(Postulacion::class);
    }
}

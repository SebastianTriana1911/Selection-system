<?php

namespace App\Models;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PonderacionEntrevistaPsicologica extends Model
{
    use HasFactory;

    protected $table = 'ponderacion_entrevistas_tecnicas';

    protected $guarded =[];

    public function postulacion():BelongsTo{
        return $this->belongsTo(Postulacion::class);
    }
}

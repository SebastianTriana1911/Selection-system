<?php

namespace App\Models;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PonderacionEntrevista extends Model
{
    use HasFactory;

    protected $table = 'ponderacion_entrevistas';

    protected $guarded =[];

    public function postulacion():BelongsTo{
        return $this->belongsTo(Postulacion::class);
    }
}

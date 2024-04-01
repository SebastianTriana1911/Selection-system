<?php

namespace App\Models;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Citacion extends Model
{
    use HasFactory;

    protected $table = 'citaciones';

    protected $guarded =[];

    public function tipoEntrevista():BelongsTo{
        return $this->belongsTo(TipoEntrevista::class);
    }

    public function postulacion(): BelongsTo{
        return $this->belongsTo(Postulacion::class);
    }
}

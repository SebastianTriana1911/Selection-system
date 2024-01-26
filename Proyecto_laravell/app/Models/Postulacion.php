<?php

namespace App\Models;

use App\Models\Candidato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postulacion extends Model{
    use HasFactory;

    protected $table = 'postulaciones';

    public function candidato(): BelongsTo{
        return $this -> belongsTo(Candidato::class);
    }

    public function vacante(): BelongsTo{
        return $this -> belongsTo(Vacante::class);
    }
}

<?php

namespace App\Models;

use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidatoDesvinculacion extends Model{
    use HasFactory;

    protected $table = 'candidatos_desvinculados';

    public function candidato(): BelongsTo{
        return $this -> belongsTo(Candidato::class);
    }

    public function vacante(): BelongsTo{
        return $this -> belongsTo(Vacante::class);
    }
}

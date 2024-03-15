<?php

namespace App\Models;

use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Municipio;
use App\Models\Postulacion;
use App\Models\EducacionVacante;
use App\Models\CandidatoDesvinculacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model{
    use HasFactory;

    public function municipio(): BelongsTo{
        return $this -> belongsTo(Municipio::class, 'municipio_id', 'id');
    }

    public function cargo(): BelongsTo{
        return $this -> belongsTo(Cargo::class, 'cargo_id', 'id');
    }

    public function empresa(): BelongsTo{
        return $this -> belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function educacionVacante(){
        return $this -> hasMany(EducacionVacante::class, 'vacante_id', 'id');
    }

    public function postulacion(): HasMany{
        return $this -> hasMany(Postulacion::class);
    }

    public function candidatoDesvinculacion(): HasMany{
        return $this -> hasMany(CandidatoDesvinculacion::class);
    }
}

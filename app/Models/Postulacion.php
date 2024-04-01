<?php

namespace App\Models;

use App\Models\Citacion;
use App\Models\Candidato;
use App\Models\Ponderacion;
use App\Models\PonderacionEntrevista;
use Illuminate\Database\Eloquent\Model;
use App\Models\PonderacionEntrevistaTecnica;
use App\Models\PonderacionEntrevistaPsicologica;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function ponderacion(): HasOne{
        return $this ->hasOne(Ponderacion::class); 
    }

    public function citacion(): HasMany{
        return $this->hasMany(Citacion::class);
    }

    public function ponderacionEntrevista():HasOne{
        return $this -> hasOne(PonderacionEntrevista::class);
    }

    public function ponderacionEntrevistaPsicologica():HasOne{
        return $this -> hasOne(PonderacionEntrevistaPsicologica::class);
    }

    public function ponderacionEntrevistaTecnica():HasOne{
        return $this -> hasOne(PonderacionEntrevistaTecnica::class);
    }
}

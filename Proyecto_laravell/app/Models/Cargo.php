<?php

namespace App\Models;

use App\Models\Empresa;
use App\Models\Habilidad;
use App\Models\Ocupacion;
use App\Models\Competencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model{
    use HasFactory;
    protected $table = 'cargos';
    protected $guarded = [];

    public function ocupacion(): BelongsTo{
        return $this -> belongsTo(Ocupacion::class, 'ocupacion_id', 'id');
    }

    public function empresa(): BelongsTo{
        return $this -> belongsTo(Empresa::class, 'empresa_id', 'id');
    }
}

<?php

namespace App\Models;

use App\Models\Municipio;
use App\Models\Reclutador;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model{
    use HasFactory;

    protected $table = 'empresas';
    protected $guarded = [];

    public function reclutador(): HasMany{
        return $this -> hasMany(Reclutador::class, 'empresa_id', 'id');
    }

    public function municipio(): BelongsTo{
        return $this -> belongsTo(Municipio::class, 'municipio_id', 'id');
    }
}

<?php

namespace App\Models;

use App\Models\Cargo;
use App\Models\Funcion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ocupacion extends Model{
    use HasFactory;

    protected $table = 'ocupaciones';
    protected $guarded = [];

    public function funcion(): HasMany{
        return $this -> hasMany(Funcion::class);
    }

    public function cargo(): HasMany{
        return $this -> hasMany(Cargo::class);
    }

    public function empresa(): BelongsTo{
        return $this -> belongsTo(Empresa::class);
    }
}

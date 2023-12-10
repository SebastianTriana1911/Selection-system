<?php

namespace App\Models;

use App\Models\Cargo;
use App\Models\Funcion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ocupacion extends Model{
    use HasFactory;

    protected $table = 'ocupaciones';
    protected $guarded = [];

    public function funcion(): HasMany{
        return $this -> hasMany(Funcion::class);
    }

    public function cargo(): HasMany{
        return $this -> hasMany(Cargo::class, 'ocupacion_id', 'id');
    }
}

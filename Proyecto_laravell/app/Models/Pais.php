<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pais extends Model{
    use HasFactory;

    protected $table = 'paises';

    protected $guarded = [];

    public function departamento(): HasMany{
        return $this -> hasMany(Departamento::class, 'pais_id', 'id');
    }
}

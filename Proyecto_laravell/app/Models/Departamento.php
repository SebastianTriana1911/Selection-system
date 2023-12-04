<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model{
    use HasFactory;

    protected $table = 'departamentos';

    protected $guarded = [];

    public function pais(): BelongsTo{
        return $this -> belongsTo(Pais::class, 'pais_id', 'id');
    }

    public function municipio(): HasMany{
        return $this -> hasMany(Municipio::class, 'departamento_id', 'id');
    }
}

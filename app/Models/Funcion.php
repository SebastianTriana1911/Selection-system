<?php

namespace App\Models;

use App\Models\Ocupacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Funcion extends Model{
    use HasFactory;
    protected $table = 'funciones';
    protected $guarded = [];

    public function ocupacion(): BelongsTo{
        return $this -> belongsTo(Ocupacion::class);
    }
}

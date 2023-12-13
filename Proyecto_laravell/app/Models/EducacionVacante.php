<?php

namespace App\Models;

use App\Models\Vacante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducacionVacante extends Model{
    use HasFactory;

    public function vacante(): BelongsTo{
        return $this -> belongsTo(Vacante::class, 'vacante_id', 'id');
    }
}

<?php

namespace App\Models;

use App\Models\Citacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoEntrevista extends Model
{
    use HasFactory;

    protected $table = 'tipo_entrevistas';

    protected $guarded =[];

    public function citacion():HasMany{
        return $this->hasMany(Citacion::class);
    }
}

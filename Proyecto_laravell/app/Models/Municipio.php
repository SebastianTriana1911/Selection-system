<?php

namespace App\Models;

use App\Models\User;
use App\Models\Empresa;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipio extends Model{
    use HasFactory;

    protected $table = 'municipios';

    protected $guarded = [];

    public function departamento(): BelongsTo{
        return $this -> belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function user(): HasOne{
        return $this -> hasOne(User::class, 'municipio_id', 'id');
    }

    public function empresa(): HasOne{
        return $this -> hasOne(Empresa::class, 'municipio_id', 'id');
    }    
}

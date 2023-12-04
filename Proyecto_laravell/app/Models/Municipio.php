<?php

namespace App\Models;

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
}

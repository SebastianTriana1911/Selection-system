<?php

namespace App\Models;

use App\Models\Cargo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habilidad extends Model{
    use HasFactory;

    protected $table = 'habilidades';
    protected $guarded = [];

    public function cargo(): BelongsTo{
        return $this -> belongsTo(Cargo::class, 'cargo_id', 'id');
    }
}

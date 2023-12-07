<?php

namespace App\Models;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reclutador extends Model{
    use HasFactory;

    protected $table = 'reclutadores';
    protected $guarded = [];

    public function empresa(): BelongsTo{
        return $this -> belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function user(): BelongsTo{
        return $this -> belongsTo(User::class);
    }
}

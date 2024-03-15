<?php

namespace App\Models;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seleccionador extends Model
{
    use HasFactory;

    protected $table = "seleccionadores";

    public function empresa(): BelongsTo{
        return $this -> belongsTo(Empresa::class);
    }

    public function user(): BelongsTo{
        return $this -> belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\Candidato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidatoEducacion extends Model{
    use HasFactory;

    protected $table = 'candidatos_educaciones';

    public function candidato():BelongsTo{
        return $this -> belongsTo(Candidato::class);
    }
}

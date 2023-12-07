<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidato extends Model{
    use HasFactory;

    protected $table = 'candidatos';

    protected $guarded = [];

    public function candidato(): BelongsTo{
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }
}

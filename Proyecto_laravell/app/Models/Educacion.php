<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Educacion extends Model{
    use HasFactory;

    protected $table = 'educaciones';

    protected $guarded = [];

    public function user(): BelongsTo{
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model{
    use HasFactory;

    protected $table = 'instructores';

    protected $guarded =[];

    public function user(): BelongsTo{
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }

    public function profesion(): HasMany{
        return $this -> hasMany(Profesion::class, 'instructor_id', 'id');
    }
}

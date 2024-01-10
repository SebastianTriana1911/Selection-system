<?php

namespace App\Models;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profesion extends Model{
    use HasFactory;

    protected $table = 'profesiones';

    protected $guarded = [];

    public function instructor(): BelongsTo{
        return $this -> belongsTo(Instructor::class, 'instructor_id', 'id');
    }

    public function getDocumento(){
        return $this->documento ? asset('public\storage' . $this->documento) : null; 
    }
}

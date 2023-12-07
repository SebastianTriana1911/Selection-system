<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Reclutador;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'users';

    protected $guarded = [];

    public function role(): BelongsTo{
        return $this -> belongsTo(Role::class, 'role_id', 'id');
    }

    public function super_usuario(){
        return $this -> hasOne(SuperUsuario::class, 'user_id', 'id');
    }

    public function instructor(): HasOne{
        return $this -> hasOne(Instructor::class, 'user_id', 'id');
    }

    public function candidato(): HasOne{
        return $this -> hasOne(Candidato::class, 'user_id', 'id');
    }

    public function reclutador(): HasOne{
        return $this -> hasOne(Reclutador::class);
    }

    public function experiencia(): HasMany{
        return $this -> hasMany(Experiencia::class, 'user_id', 'id');
    }

    public function educacion(): HasMany{
        return $this -> hasMany(Educacion::class, 'user_id', 'id');
    }

    public function municipio(): BelongsTo{
        return $this -> belongsTo(Municipio::class, 'municipio_id', 'id');
    }
}

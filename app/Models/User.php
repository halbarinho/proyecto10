<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dni',
        'name',
        'last_name_1',
        'last_name_2',
        'gender',
        'email',
        'password',
        // 'profile_photo_path',
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

    /**
     *Aplicamos encriptacion al password antes de almacenarlo
     */
    protected function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = bcrypt($password);
        // $this->attributes['password'] = Hash::make($value);
    }

    public function Docente(): HasMany
    {
        return $this->hasMany(Docente::class);
    }

    public function Alumno(): HasMany
    {
        return $this->hasMany(Estudiante::class);
    }
}

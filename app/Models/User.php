<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Phone;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

// The User model requires this trait
//Añadido para usar Spatie Roles/Permisos
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // The User model requires this trait

    //Añadido para usar Spatie Roles/Permisos
    use HasRoles;

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
        'user_type',
        'profile_photo_path',
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

    }

    public function Docente(): HasOne
    {
        return $this->hasOne(Docente::class);
    }

    public function Estudiante(): HasOne
    {
        return $this->hasOne(Estudiante::class, 'user_id', 'id');
    }

    public function Phone(): HasMany
    {
        return $this->hasMany(Phone::class);
    }

    public function Classroom(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }

    public function Post(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function Chat(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class);
    }

    public function Message(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    //Relacion con notificacion
    public function Notification(): HasMany
    {
        return $this->hasMany(Notification::class, 'id', 'user_id');
    }

}

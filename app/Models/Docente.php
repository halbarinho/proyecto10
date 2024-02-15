<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality',
        // 'dni_FK'
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Classroom(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }

    public function Activity(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

}

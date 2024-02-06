<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_FK',
        'date_of_birth',
        'history'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

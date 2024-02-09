<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}

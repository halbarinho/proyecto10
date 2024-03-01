<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'user_id',
        'stage_id',
        'level_id'
    ];

    public function Docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }

    public function Estudiante(): HasMany
    {
        return $this->hasMany(Estudiante::class);
    }

    public function Stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function StageLevel(): BelongsTo
    {
        return $this->belongsTo(StageLevel::class);
    }
}

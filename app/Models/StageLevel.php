<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StageLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_name',
        'stage_id',
    ];

    public function Stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function Classroom(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
}

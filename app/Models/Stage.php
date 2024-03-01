<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'stage_name',
    ];

    public function Classroom(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }

    public function StageLevel(): HasMany
    {
        return $this->hasMany(StageLevel::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivitiesResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'estudiante_id',
        'class_id',
        'status',
    ];


    public function Activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function Estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }

    public function Classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}

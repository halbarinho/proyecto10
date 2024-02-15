<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;


    protected $fillable = [

        'activity_name',
        'activity_description',
        'user_id'


    ];

    public function Docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }

    public function Estudiante(): BelongsToMany
    {
        return $this->belongsToMany(Estudiante::class);
    }

    public function Question(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'activity_questions', 'id', 'id');
    }

}

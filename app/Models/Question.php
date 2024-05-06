<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;


    protected $fillable = [
        'question_text',
        'question_type',

    ];


    public function QuestionOption(): HasMany
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'id');
    }

    public function Activity(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_questions');
    }

    public function Answer(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }


}

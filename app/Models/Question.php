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
    // public function Activity(): BelongsToMany
    // {
    //     return $this->belongsToMany(Activity::class);
    // }

    public function QuestionOption(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function Activity(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_questions');
    }



}

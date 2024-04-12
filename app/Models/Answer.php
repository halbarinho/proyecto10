<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'question_id',
        'activity_id',
        'answer_text',
        'answer_bool'
    ];

    public function Estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'user_id', 'student_id');
    }

    public function Question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function Activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'id', 'activity_id');
    }

}

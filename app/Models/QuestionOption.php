<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'is_right',
    ];

    public function Question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}

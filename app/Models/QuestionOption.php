<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_text',
        'is_right',
        'question_id',
    ];

    public function Question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'id', 'question_id');
    }
}

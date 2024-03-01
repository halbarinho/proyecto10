<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ActivityQuestion extends Model
{
    use HasFactory;


    protected $fillable = [
        'activity_id',
        'question_id',
    ];

    public function Activity(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class);
    }

    public function Question(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }

}

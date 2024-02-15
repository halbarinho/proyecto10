<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;


    protected $fillable = [
        'answer_text',
        'answer_bool'
    ];

    public function Estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class);
    }

}

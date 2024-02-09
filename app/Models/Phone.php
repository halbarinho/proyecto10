<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}




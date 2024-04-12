<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;

    public function User(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function Message(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}

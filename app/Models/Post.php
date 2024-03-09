<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'img_url',
        'active',
        'slug',
        'category_id',
        'user_id',
    ];


    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

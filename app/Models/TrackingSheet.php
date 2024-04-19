<?php

namespace App\Models;

use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackingSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'observations',
    ];

    public function Estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'user_id', 'student_id');
    }
}

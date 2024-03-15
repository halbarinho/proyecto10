<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitiesResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'estudiante_id',
    ];


}

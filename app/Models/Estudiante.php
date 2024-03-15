<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estudiante extends Model
{
    use HasFactory;

    /**
     * Añado este atributo para determinar que el atributo user_id actua como id de la tabla
     * y poder usar metodos como el findorFail
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        // 'dni_FK',
        'date_of_birth',
        'history',
        'class_id',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function Activity(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activities_results', 'user_id', 'id');
    }

    public function Answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}

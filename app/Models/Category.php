<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Evitar que el la categoria 'sin asignar' se elimine
        static::deleting(function ($category) {
            if ($category->name == 'Sin Asignar') {
                return false; //
            } elseif ($category->Post->isNotEmpty()) {

                // Obtener la categoría 'undefined' o crearla si no existe
                $undefinedCategory = Category::firstOrCreate(['name' => 'Sin Asignar', 'description' => 'undefined']);

                // Asignar la categoría 'undefined' a los posts asociados
                $category->Post()->update(['category_id' => $undefinedCategory->id]);
            }
        });

        // Evitar que el la categoria 'sin asignar' se modifique
        static::updating(function ($category) {
            if ($category->getOriginal('name') == 'Sin Asignar') {
                return false;
            }
        });
    }

    public function Post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}

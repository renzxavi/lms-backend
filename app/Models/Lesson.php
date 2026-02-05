<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'order',
        'icon',
        'color',
    ];

    /**
     * Relación: Una lección tiene muchos ejercicios
     */
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
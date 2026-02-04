<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'difficulty',
        'points',
        'lesson_id',
        'expected_result', // Asegúrate de que esté en fillable si lo usas para validar
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // Relación para obtener TODOS los registros de progreso (Admin/Stats)
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    // Relación específica para el usuario autenticado (Ideal para el Dashboard)
    public function userProgress()
    {
        return $this->hasOne(Progress::class)->where('user_id', auth()->id());
    }
}
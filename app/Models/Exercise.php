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
        'instructions',
        'toolbox',
        'expected_result',
        'difficulty',
        'points',
        'lesson_id',
        'character',
        'story',
        'help_video_url',
        'help_text',
        'content',
        'video_url',
        'order', // IMPORTANTE: Asegúrate de que este campo exista
    ];

    protected $casts = [
        'toolbox' => 'array',
    ];

    protected $appends = ['is_locked']; // NUEVO: Agregar automáticamente al JSON

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function userProgress()
    {
        return $this->hasOne(Progress::class)->where('user_id', auth()->id());
    }

    // NUEVO: Método para calcular si está bloqueado
    public function getIsLockedAttribute()
    {
        if (!auth()->check()) {
            return true; // Si no hay usuario autenticado, todo está bloqueado
        }

        $userId = auth()->id();

        // El primer ejercicio nunca está bloqueado
        $firstExercise = Exercise::orderBy('lesson_id')->orderBy('order')->first();
        if ($this->id === $firstExercise->id) {
            return false;
        }

        // Verificar si es el primer ejercicio de su lección
        $firstInLesson = Exercise::where('lesson_id', $this->lesson_id)
            ->orderBy('order')
            ->first();
        
        if ($this->id === $firstInLesson->id) {
            // Verificar si completó la lección anterior
            $previousLesson = Lesson::where('order', '<', $this->lesson->order)
                ->orderBy('order', 'desc')
                ->first();
            
            if ($previousLesson) {
                // Verificar que todos los ejercicios de la lección anterior estén completados
                $previousLessonExercisesCount = Exercise::where('lesson_id', $previousLesson->id)->count();
                $completedCount = Progress::where('user_id', $userId)
                    ->where('completed', true)
                    ->whereIn('exercise_id', function($query) use ($previousLesson) {
                        $query->select('id')
                            ->from('exercises')
                            ->where('lesson_id', $previousLesson->id);
                    })
                    ->count();
                
                return $completedCount < $previousLessonExercisesCount;
            }
            
            return false; // Primera lección, no bloqueado
        }

        // Verificar ejercicio anterior en la misma lección
        $previousExercise = Exercise::where('lesson_id', $this->lesson_id)
            ->where('order', '<', $this->order)
            ->orderBy('order', 'desc')
            ->first();

        if (!$previousExercise) {
            return false; // No hay ejercicio anterior
        }

        // Verificar si el ejercicio anterior está completado
        $previousCompleted = Progress::where('user_id', $userId)
            ->where('exercise_id', $previousExercise->id)
            ->where('completed', true)
            ->exists();

        return !$previousCompleted;
    }

    // NUEVO: Método helper para usar en validaciones
    public function isLockedForUser($userId)
    {
        // Similar a getIsLockedAttribute pero recibe el userId como parámetro
        $firstExercise = Exercise::orderBy('lesson_id')->orderBy('order')->first();
        if ($this->id === $firstExercise->id) {
            return false;
        }

        $firstInLesson = Exercise::where('lesson_id', $this->lesson_id)
            ->orderBy('order')
            ->first();
        
        if ($this->id === $firstInLesson->id) {
            $previousLesson = Lesson::where('order', '<', $this->lesson->order)
                ->orderBy('order', 'desc')
                ->first();
            
            if ($previousLesson) {
                $previousLessonExercisesCount = Exercise::where('lesson_id', $previousLesson->id)->count();
                $completedCount = Progress::where('user_id', $userId)
                    ->where('completed', true)
                    ->whereIn('exercise_id', function($query) use ($previousLesson) {
                        $query->select('id')
                            ->from('exercises')
                            ->where('lesson_id', $previousLesson->id);
                    })
                    ->count();
                
                return $completedCount < $previousLessonExercisesCount;
            }
            
            return false;
        }

        $previousExercise = Exercise::where('lesson_id', $this->lesson_id)
            ->where('order', '<', $this->order)
            ->orderBy('order', 'desc')
            ->first();

        if (!$previousExercise) {
            return false;
        }

        $previousCompleted = Progress::where('user_id', $userId)
            ->where('exercise_id', $previousExercise->id)
            ->where('completed', true)
            ->exists();

        return !$previousCompleted;
    }
}
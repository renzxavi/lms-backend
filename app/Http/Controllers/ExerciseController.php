<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Progress;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        // Los ejercicios ya incluirán 'is_locked' automáticamente gracias al $appends
        $exercises = Exercise::with(['lesson', 'userProgress'])
            ->orderBy('lesson_id')
            ->orderBy('order')
            ->get();
        
        return response()->json($exercises);
    }

    public function show($id)
    {
        $exercise = Exercise::with(['lesson', 'userProgress'])->findOrFail($id);
        
        // NUEVO: Verificar si está bloqueado
        if ($exercise->is_locked) {
            return response()->json([
                'message' => 'Este ejercicio está bloqueado. Completa los ejercicios anteriores primero.',
                'locked' => true
            ], 403); // Forbidden
        }
        
        return response()->json($exercise);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'code' => 'required|string',
            'result' => 'nullable',
        ]);

        $exercise = Exercise::with('lesson')->findOrFail($validated['exercise_id']);
        $user = $request->user();

        // NUEVO: Validar que el ejercicio NO esté bloqueado
        if ($exercise->isLockedForUser($user->id)) {
            return response()->json([
                'message' => 'No puedes enviar respuestas a un ejercicio bloqueado. Completa los ejercicios anteriores primero.',
                'error' => 'exercise_locked'
            ], 403);
        }

        // 1. Buscar progreso existente
        $progress = Progress::where('user_id', $user->id)
            ->where('exercise_id', $exercise->id)
            ->first();

        // Si ya estaba completado, no sumamos puntos pero permitimos re-entrega
        $alreadyCompleted = $progress && $progress->completed;

        // 2. VALIDACIÓN
        $isCorrect = $this->validateExercise($exercise, $validated['code'], $validated['result']);

        // 3. ACTUALIZAR O CREAR PROGRESO
        if (!$progress) {
            $progress = Progress::create([
                'user_id' => $user->id,
                'exercise_id' => $exercise->id,
                'code' => $validated['code'],
                'result' => json_encode($validated['result']),
                'completed' => $isCorrect,
                'points_earned' => $isCorrect ? $exercise->points : 0,
                'attempts' => 1,
            ]);
        } else {
            $progress->update([
                'code' => $validated['code'],
                'result' => json_encode($validated['result']),
                'completed' => $isCorrect || $progress->completed,
                'points_earned' => ($isCorrect || $progress->completed) ? $exercise->points : 0,
                'attempts' => $progress->attempts + 1,
            ]);
        }

        // 4. INCREMENTAR PUNTOS (Solo si acaba de pasar de falso a verdadero)
        if ($isCorrect && !$alreadyCompleted) {
            $user->increment('total_points', $exercise->points);
        }

        return response()->json([
            'message' => $isCorrect ? '¡Correcto! 🎉 Excelente trabajo' : 'Intenta de nuevo 💪',
            'correct' => $isCorrect,
            'points_earned' => $isCorrect && !$alreadyCompleted ? $exercise->points : 0,
            'total_points' => $user->fresh()->total_points
        ]);
    }

    private function validateExercise($exercise, $code, $result)
    {
        $output = $result['output'] ?? '';
        
        $normalizedOutput = strtolower(trim(str_replace(['"', "'", ' ', '¡', '!'], '', $output)));
        $normalizedExpected = strtolower(trim(str_replace(['"', "'", ' ', '¡', '!'], '', $exercise->expected_result)));
        
        if (str_contains($normalizedOutput, $normalizedExpected)) {
            return true;
        }
        
        if (is_numeric($normalizedExpected)) {
            if (str_contains($normalizedOutput, $normalizedExpected)) {
                return true;
            }
        }
        
        if (!empty($code) && !empty($output) && strlen($normalizedExpected) < 5) {
            return true;
        }
        
        return false;
    }

    public function lessons()
    {
        $lessons = \App\Models\Lesson::with('exercises.userProgress')
            ->orderBy('order')
            ->get();
        
        return response()->json($lessons);
    }
}
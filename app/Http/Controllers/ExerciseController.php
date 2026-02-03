<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Progress;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::with('lesson')->get();
        return response()->json($exercises);
    }

    public function show($id)
    {
        $exercise = Exercise::with('lesson')->findOrFail($id);
        return response()->json($exercise);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'code' => 'required|string',
            'result' => 'nullable',
        ]);

        $exercise = Exercise::findOrFail($validated['exercise_id']);
        $user = $request->user();

        // Verificar si ya completó este ejercicio
        $progress = Progress::where('user_id', $user->id)
            ->where('exercise_id', $exercise->id)
            ->first();

        if ($progress && $progress->completed) {
            return response()->json([
                'message' => '¡Ya completaste este ejercicio!',
                'correct' => true,
                'points_earned' => 0,
                'total_points' => $user->total_points
            ]);
        }

        // VALIDACIÓN MEJORADA
        $isCorrect = $this->validateExercise($exercise, $validated['code'], $validated['result']);

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
            $wasCompleted = $progress->completed;
            $progress->update([
                'code' => $validated['code'],
                'result' => json_encode($validated['result']),
                'completed' => $isCorrect,
                'points_earned' => $isCorrect ? $exercise->points : 0,
                'attempts' => $progress->attempts + 1,
            ]);
        }

        // Incrementar puntos solo si es la primera vez que lo completa
        if ($isCorrect && !($progress->getOriginal('completed') ?? false)) {
            $user->increment('total_points', $exercise->points);
        }

        return response()->json([
            'message' => $isCorrect ? '¡Correcto! 🎉 Excelente trabajo' : 'Intenta de nuevo 💪',
            'correct' => $isCorrect,
            'points_earned' => $isCorrect ? $exercise->points : 0,
            'total_points' => $user->fresh()->total_points
        ]);
    }

    private function validateExercise($exercise, $code, $result)
    {
        // Obtener el output del resultado
        $output = $result['output'] ?? '';
        
        // Normalizar para comparación (quitar espacios, minúsculas, comillas)
        $normalizedOutput = strtolower(trim(str_replace(['"', "'", ' ', '¡', '!'], '', $output)));
        $normalizedExpected = strtolower(trim(str_replace(['"', "'", ' ', '¡', '!'], '', $exercise->expected_result)));
        
        // Validación flexible
        if (str_contains($normalizedOutput, $normalizedExpected)) {
            return true;
        }
        
        // Si esperamos un número, validar que el número esté presente
        if (is_numeric($normalizedExpected)) {
            if (str_contains($normalizedOutput, $normalizedExpected)) {
                return true;
            }
        }
        
        // Si hay código y output (para ejercicios abiertos)
        if (!empty($code) && !empty($output) && strlen($normalizedExpected) < 5) {
            return true;
        }
        
        return false;
    }

    public function lessons()
    {
        $lessons = \App\Models\Lesson::with('exercises')->orderBy('order')->get();
        return response()->json($lessons);
    }
}
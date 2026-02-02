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
                'message' => 'Ya completaste este ejercicio',
                'correct' => false,
                'points_earned' => 0
            ]);
        }

        // Simular validación (aquí deberías validar el código real)
        $isCorrect = true; // Por ahora siempre correcto para testing

        if (!$progress) {
            $progress = Progress::create([
                'user_id' => $user->id,
                'exercise_id' => $exercise->id,
                'code' => $validated['code'],
                'result' => $validated['result'],
                'completed' => $isCorrect,
                'points_earned' => $isCorrect ? $exercise->points : 0,
                'attempts' => 1,
            ]);
        } else {
            $progress->update([
                'code' => $validated['code'],
                'result' => $validated['result'],
                'completed' => $isCorrect,
                'points_earned' => $isCorrect ? $exercise->points : 0,
                'attempts' => $progress->attempts + 1,
            ]);
        }

        if ($isCorrect) {
            $user->increment('total_points', $exercise->points);
        }

        return response()->json([
            'message' => $isCorrect ? '¡Correcto! Excelente trabajo' : 'Intenta de nuevo',
            'correct' => $isCorrect,
            'points_earned' => $isCorrect ? $exercise->points : 0,
            'total_points' => $user->fresh()->total_points
        ]);
    }

    public function lessons()
    {
        $lessons = \App\Models\Lesson::with('exercises')->orderBy('order')->get();
        return response()->json($lessons);
    }
}
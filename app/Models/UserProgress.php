<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    /**
     * Guardar o actualizar el progreso del usuario
     */
    public function store(Request $request, Exercise $exercise)
    {
        $request->validate([
            'code' => 'required|string',
            'result' => 'nullable|array',
            'completed' => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            $progress = Progress::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'exercise_id' => $exercise->id,
                ],
                [
                    'code' => $request->code,
                    'result' => $request->result,
                    'completed' => $request->completed,
                    'attempts' => DB::raw('attempts + 1'),
                ]
            );

            // Solo otorgar puntos si completó por primera vez
            if ($request->completed && !$progress->wasRecentlyCreated && $progress->points_earned == 0) {
                $progress->points_earned = $exercise->points;
                $progress->save();

                // Actualizar puntos totales del usuario
                $user = auth()->user();
                $user->increment('total_points', $exercise->points);
            } elseif ($request->completed && $progress->wasRecentlyCreated) {
                $progress->points_earned = $exercise->points;
                $progress->save();

                // Actualizar puntos totales del usuario
                $user = auth()->user();
                $user->increment('total_points', $exercise->points);
            }

            DB::commit();

            return response()->json([
                'message' => 'Progreso guardado exitosamente',
                'progress' => $progress->fresh(),
                'total_user_points' => auth()->user()->fresh()->total_points ?? 0,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error al guardar el progreso',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener el progreso del usuario para un ejercicio específico
     */
    public function show(Exercise $exercise)
    {
        $progress = Progress::where('user_id', auth()->id())
            ->where('exercise_id', $exercise->id)
            ->first();

        return response()->json([
            'progress' => $progress,
        ]);
    }

    /**
     * Obtener todo el progreso del usuario
     */
    public function index()
    {
        $progress = Progress::where('user_id', auth()->id())
            ->with('exercise')
            ->get();

        $stats = [
            'total_exercises' => Exercise::count(),
            'completed_exercises' => $progress->where('completed', true)->count(),
            'total_points' => auth()->user()->total_points ?? 0,
            'total_attempts' => $progress->sum('attempts'),
        ];

        return response()->json([
            'progress' => $progress,
            'stats' => $stats,
        ]);
    }

    /**
     * Reiniciar el progreso de un ejercicio
     */
    public function reset(Exercise $exercise)
    {
        $progress = Progress::where('user_id', auth()->id())
            ->where('exercise_id', $exercise->id)
            ->first();

        if ($progress) {
            // Restar puntos si ya los había ganado
            if ($progress->points_earned > 0) {
                $user = auth()->user();
                $user->decrement('total_points', $progress->points_earned);
            }

            $progress->delete();

            return response()->json([
                'message' => 'Progreso reiniciado exitosamente',
            ]);
        }

        return response()->json([
            'message' => 'No hay progreso para reiniciar',
        ], 404);
    }
}
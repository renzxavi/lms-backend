<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index(Request $request)
    {
        $progress = Progress::where('user_id', $request->user()->id)
            ->with('exercise')
            ->get();

        return response()->json($progress);
    }

    public function show(Request $request, $exerciseId)
    {
        $progress = Progress::where('user_id', $request->user()->id)
            ->where('exercise_id', $exerciseId)
            ->with('exercise')
            ->first();

        return response()->json($progress);
    }

    public function leaderboard()
    {
        $users = User::select('id', 'name', 'total_points')
            ->withCount(['progress as exercises_completed' => function ($query) {
                $query->where('completed', true);
            }])
            ->orderBy('total_points', 'desc')
            ->limit(10)
            ->get();

        return response()->json($users);
    }
}
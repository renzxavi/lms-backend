<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::with(['exercises' => function($query) {
            $query->orderBy('id', 'asc');
        }])
        ->orderBy('order', 'asc')
        ->get();

        return response()->json($lessons);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = Lesson::with(['exercises' => function($query) {
            $query->orderBy('id', 'asc');
        }])->findOrFail($id);

        return response()->json($lesson);
    }
}
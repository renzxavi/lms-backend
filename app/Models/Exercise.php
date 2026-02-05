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
    'content',    // NUEVO
    'video_url',  // NUEVO
];

    protected $casts = [
        'toolbox' => 'array',
    ];

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
}
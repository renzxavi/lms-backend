<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('instructions')->nullable();
            $table->json('toolbox')->nullable();
            $table->text('expected_result')->nullable();
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('easy');
            $table->integer('points')->default(10);
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->string('character')->nullable();
            $table->text('story')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
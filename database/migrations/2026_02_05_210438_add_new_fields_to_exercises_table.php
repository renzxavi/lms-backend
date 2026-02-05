<?php
// database/migrations/2024_xx_xx_add_content_fields_to_exercises_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('story');
            $table->string('video_url')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropColumn(['content', 'video_url']);
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Usamos ->after('email') para que en la base de datos se vea ordenado
            $table->integer('total_points')->default(0)->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Es vital definir el "down" para poder revertir cambios
            $table->dropColumn('total_points');
        });
    }
};
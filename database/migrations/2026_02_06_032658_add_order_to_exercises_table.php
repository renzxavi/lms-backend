<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Support;

return new class extends Migration
{
    public function up()
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->integer('order')->default(0)->after('lesson_id');
        });
    }

    public function down()
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
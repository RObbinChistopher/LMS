<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('course_thumbnail_images');
            $table->string('course_title');
            $table->string('instructor_name');
            $table->integer('catId');
            $table->integer('subCatId');
            $table->integer('childCatId');
            $table->string('level')->default('Beginner_level');
            $table->string('course_language')->default('English');
            $table->longText('course_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

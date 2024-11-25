<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Name of the lesson (e.g., "Lesson 1: Introduction")
            $table->text('content')->nullable(); // Content of the lesson (can be null if not set)
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Foreign key to the courses table
            $table->integer('order')->default(0); // The order of the lesson within the course
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};

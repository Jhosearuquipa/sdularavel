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
            $table->integer('other_id')->nullable();
            $table->integer('campus_id')->nullable();
            $table->integer('course_catalogue_id')->nullable();
            $table->string('name');
            $table->dateTime('fh_course_start');
            $table->dateTime('fh_course_end');
            $table->integer('cant_day');
            $table->integer('cant_hour');
            $table->integer('modality_id');
            $table->integer('system_id');
            $table->integer('module_id');
            $table->integer('user_type_id');
            $table->integer('convocatoria_id');
            $table->integer('certificate_id');
            $table->integer('certificated_by_id');
            $table->integer('project_id');
            $table->integer('course_type_id');
            $table->integer('professor_id');
            $table->integer('professor2_id');
            $table->integer('sede')->nullable();
            $table->string('category')->nullable();
            $table->string('platform')->nullable();
            $table->dateTime('meet_date')->nullable();
            $table->string('comments')->nullable();
            $table->string('active');
            $table->integer('leaving_date')->nullable();
            $table->integer('leaving_reason')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
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
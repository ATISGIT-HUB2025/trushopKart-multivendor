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
        Schema::create('exam_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->text('description');
            $table->string('exam_date');
            $table->string('duration');
            $table->string('medium');
            $table->string('total_marks');
            $table->string('eligibility');
            $table->string('mode');
            $table->integer('serial');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_categories');
    }
};

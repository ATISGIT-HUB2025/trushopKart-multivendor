<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_category_id')->constrained('exam_categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('duration')->comment('in minutes');
            $table->integer('total_marks');
            $table->integer('pass_marks');
            $table->decimal('price', 8, 2)->default(0);
            $table->boolean('is_paid')->default(false);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};

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
        Schema::create('primary_results', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->nullable();
            $table->string('division')->nullable();
            $table->integer('sr_no');
            $table->string('district');
            $table->string('taluka');
            $table->string('cluster');
            $table->string('exam_centre')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('std');
            $table->string('medium');
            $table->string('school_name');
            $table->string('udise_no')->nullable();
            $table->string('student_saral_id');
            $table->string('parent_mobile');
            $table->string('teacher_mobile')->nullable();
            $table->string('barcode');
            $table->string('seat_no');
            $table->decimal('first_paper', 8, 2);
            $table->decimal('second_paper', 8, 2)->nullable();
            $table->decimal('total_marks', 8, 2);
            $table->decimal('percentage', 8, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_results');
    }
};

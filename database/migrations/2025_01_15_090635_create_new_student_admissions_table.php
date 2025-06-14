<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_admissions', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->nullable();
            $table->string('division');
            $table->string('sr_no');
            $table->string('district');
            $table->string('taluka');
            $table->string('cluster');
            $table->string('exam_center')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('std');
            $table->string('medium');
            $table->string('school_name');
            $table->string('udise_no_school')->nullable();
            $table->string('student_serial_id');
            $table->string('parent_mobile_number')->nullable();
            $table->string('teacher_mobile_number')->nullable();
            $table->string('barcode')->nullable();
            $table->string('seat_no')->nullable();
            $table->string('paper_1')->nullable();
            $table->string('paper_2')->nullable();
            $table->foreignId('teacher_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_admissions');
    }
};

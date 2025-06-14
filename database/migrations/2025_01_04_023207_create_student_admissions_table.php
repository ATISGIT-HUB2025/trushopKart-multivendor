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
            $table->foreignId('teacher_id');
            $table->string('student_id');
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('state');
            $table->string('district');
            $table->string('taluka');
            $table->string('cluster');
            $table->string('school_name');
            $table->string('medium');
            $table->string('standard');
            $table->string('gender');
            $table->string('center_name');
            $table->boolean('isGenerated')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_admissions');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('state');
            $table->string('district');
            $table->string('taluka');
            $table->string('cluster');
            $table->string('school_name');
            $table->string('medium');
            $table->string('standard');
            $table->string('email');
            $table->string('gender');
            $table->string('parent_mobile');
            $table->string('teacher_mobile');
            $table->string('photo')->nullable();
            $table->string('selected_exam');
            $table->string('exam_type');
            $table->decimal('admission_fee', 10, 2);
            $table->decimal('additional_fee', 10, 2)->default(0);
            $table->decimal('total_fee', 10, 2);
            $table->string('payment_status');
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admissions');
    }
};

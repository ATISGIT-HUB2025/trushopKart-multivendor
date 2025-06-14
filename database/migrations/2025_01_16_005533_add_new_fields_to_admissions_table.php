<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->string('user_type')->nullable();
            $table->string('division')->nullable();
            $table->string('sr_no')->nullable();
 
            $table->string('udise_no_school')->nullable();
            $table->string('student_serial_id')->nullable();
            $table->string('barcode')->nullable();
            $table->string('seat_no')->nullable();
            $table->string('paper_1')->nullable();
            $table->string('paper_2')->nullable();
        });
    }

    public function down()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropColumn([
                'user_type',
                'division',
                'sr_no',
                'udise_no_school',
                'student_serial_id',
                'barcode',
                'seat_no',
                'paper_1',
                'paper_2'
            ]);
        });
    }
};

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
        Schema::table('exams', function (Blueprint $table) {
            $table->string('subject')->nullable();
            $table->string('standard')->nullable();
            $table->string('medium')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn(['subject', 'standard', 'medium']);
        });
    }
    
};

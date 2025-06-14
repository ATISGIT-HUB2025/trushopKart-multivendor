<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('school_infos', function (Blueprint $table) {
            $table->id();
            $table->string('sr_no')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('taluka')->nullable();
            $table->string('cluster')->nullable();
            $table->string('udise')->nullable();
            $table->string('school_name')->nullable();
            $table->string('village_town')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('school_infos');
    }
};

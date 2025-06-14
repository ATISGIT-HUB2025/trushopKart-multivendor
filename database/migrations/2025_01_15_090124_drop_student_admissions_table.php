<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('student_admissions');
    }

    public function down()
    {
        // No need for down() as we're creating a new table in next migration
    }
};

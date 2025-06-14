<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->boolean('is_upcoming')->default(0)->after('status');
            $table->dateTime('start_date')->nullable()->after('is_upcoming');
            $table->dateTime('end_date')->nullable()->after('start_date');
        });
    }

    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn(['is_upcoming', 'start_date', 'end_date']);
        });
    }
};

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
        Schema::table('primary_results', function (Blueprint $table) {
            $table->boolean('division_merit')->default(false);
            $table->boolean('district_merit')->default(false);
            $table->boolean('taluka_merit')->default(false);
            $table->boolean('center_merit')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('primary_results', function (Blueprint $table) {
            $table->dropColumn(['division_merit', 'district_merit', 'taluka_merit', 'center_merit']);
        });
    }
    
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRankColumnsToPrimaryResults extends Migration
{
    public function up()
    {
        Schema::table('primary_results', function (Blueprint $table) {
            $table->integer('state_rank')->nullable();
            $table->integer('division_rank')->nullable();
            $table->integer('district_rank')->nullable();
            $table->integer('taluka_rank')->nullable();
            $table->integer('center_rank')->nullable();
        });
    }

    public function down()
    {
        Schema::table('primary_results', function (Blueprint $table) {
            $table->dropColumn([
                'state_rank', 
                'division_rank', 
                'district_rank', 
                'taluka_rank', 
                'center_rank'
            ]);
        });
    }
}

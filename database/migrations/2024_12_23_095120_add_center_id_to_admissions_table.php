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
        Schema::table('admissions', function (Blueprint $table) {
            $table->foreignId('center_id')->nullable()->constrained('centers')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropForeign(['center_id']);
            $table->dropColumn('center_id');
        });
    }
    
};

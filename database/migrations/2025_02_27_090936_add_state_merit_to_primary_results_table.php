<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('primary_results', function (Blueprint $table) {
            $table->boolean('state_merit')->after('percentage')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('primary_results', function (Blueprint $table) {
            $table->dropColumn('state_merit');
        });
    }
};

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
        Schema::table('general_settings', function (Blueprint $table) {
            $table->boolean('show_certificate_button')->default(true)->after('site_name');
            $table->boolean('show_marksheet_button')->default(true)->after('show_certificate_button');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn('show_certificate_button');
            $table->dropColumn('show_marksheet_button');
        });
    }
};

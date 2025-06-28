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
         Schema::table('products', function (Blueprint $table) {
        $table->enum('product_mode', ['single', 'combo'])->default('single')->after('price');
        $table->text('combo_items')->nullable()->after('product_type'); // to store JSON like [{"product_id":1,"qty":2},...]
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['product_type', 'combo_items']);
    });
    }
};
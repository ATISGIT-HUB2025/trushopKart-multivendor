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
    { Schema::create('product_licence_keys', function (Blueprint $table) {
        $table->id();
        $table->string('sr_no');
        $table->string('product_key');
        $table->enum('assigned', ['Y', 'N'])->default('N');
        $table->string('assigned_user')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_licence_keys');
    }
};
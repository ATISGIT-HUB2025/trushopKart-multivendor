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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable(); 
            $table->string('name')->nullable(); 
            $table->string('type')->nullable(); // optionally store the data type (e.g., 'longtext', 'int')
            $table->longText('value')->nullable(); // actual value of the attribute
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};

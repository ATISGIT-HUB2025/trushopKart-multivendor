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
        // Schema::create('press_release', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('title')->nullable();
        //      $table->text('short_desc')->nullable();
        //      $table->text('image')->nullable();
        //      $table->boolean('status')->default(1);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Schema::dropIfExists('press_release');
    }
};

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
        Schema::create('request_access', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->string('subject')->nullable();
            $table->text('details')->nullable();
            $table->text('comment')->nullable()->comment('Admin comment');
            $table->tinyInteger('status')
            ->default(0)
            ->comment('0 means request sent, 1 means approved, 2 means rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_access');
    }
};

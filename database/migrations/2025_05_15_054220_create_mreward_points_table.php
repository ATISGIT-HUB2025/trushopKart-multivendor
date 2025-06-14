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
        Schema::create('mreward_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('scanner_wallet_id');
            $table->string('transaction_id')->unique();
            $table->string('screenshot')->nullable();
            $table->integer('points');
            $table->decimal('point_rate', 8, 2);
            $table->enum('type', ['credit', 'debit']);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mreward_points');
    }
};
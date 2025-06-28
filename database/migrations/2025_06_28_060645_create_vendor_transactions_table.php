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
        Schema::create('vendor_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method')->nullable(); // e.g. 'bank_transfer', 'upi', 'cash'
            $table->string('transaction_id')->nullable(); // for reference or UTR number
            $table->string('status')->default('completed'); // 'completed', 'pending', 'failed'
            $table->text('note')->nullable(); // optional notes
            $table->date('paid_at')->nullable(); // when payment was made
            $table->timestamps();

            // Foreign key to vendors table
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_transactions');
    }
};
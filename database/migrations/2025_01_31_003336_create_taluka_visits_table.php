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
        Schema::create('taluka_visits', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->integer('total_book_order');
            $table->decimal('total_book_payment', 10, 2);
            $table->integer('total_admission');
            $table->decimal('total_admission_payment', 10, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taluka_visits');
    }
};

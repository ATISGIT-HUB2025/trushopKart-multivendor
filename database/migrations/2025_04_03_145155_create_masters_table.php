<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('heading')->nullable();
            $table->string('result_logo')->nullable();
            $table->string('result_heading')->nullable();
            $table->string('administrator_signature')->nullable();
            $table->string('administrator_name')->nullable();
            $table->string('director_signature')->nullable();
            $table->string('director_name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};

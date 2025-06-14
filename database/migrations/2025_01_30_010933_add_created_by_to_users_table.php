<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the column (nullable if users can exist without a creator)
            $table->unsignedBigInteger('created_by')->nullable()->after('id'); // Adjust "after()" as needed
            
            // Add foreign key constraint (optional)
            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('SET NULL'); // Or 'CASCADE' based on your needs
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['created_by']);
            
            // Remove the column
            $table->dropColumn('created_by');
        });
    }
};
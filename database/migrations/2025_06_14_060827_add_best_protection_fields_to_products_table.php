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
            $table->text('best_protectIon_android_heading')->nullable();
            $table->string('best_protectIon_android_icon_a')->nullable();
            $table->string('best_protectIon_android__a_title')->nullable();
            $table->json('best_protectIon_android__a_desc')->nullable();
            $table->string('best_protectIon_android_icon_b')->nullable();
            $table->string('best_protectIon_android__b_title')->nullable();
            $table->json('best_protectIon_android__b_desc')->nullable();
            $table->string('best_protectIon_android_icon_c')->nullable();
            $table->string('best_protectIon_android__c_title')->nullable();
            $table->json('best_protectIon_android__c_desc')->nullable();

            // iOS fields
            $table->text('best_protectIon_ios_heading')->nullable();
            $table->string('best_protectIon_ios_icon_a')->nullable();
            $table->string('best_protectIon_ios__a_title')->nullable();
            $table->json('best_protectIon_ios__a_desc')->nullable();
            $table->string('best_protectIon_ios_icon_b')->nullable();
            $table->string('best_protectIon_ios__b_title')->nullable();
            $table->json('best_protectIon_ios__b_desc')->nullable();
            $table->string('best_protectIon_ios_icon_c')->nullable();
            $table->string('best_protectIon_ios__c_title')->nullable();
            $table->json('best_protectIon_ios__c_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
           $table->dropColumn([
                'best_protectIon_android_heading',
                'best_protectIon_android_icon_a',
                'best_protectIon_android__a_title',
                'best_protectIon_android__a_desc',
                'best_protectIon_android_icon_b',
                'best_protectIon_android__b_title',
                'best_protectIon_android__b_desc',
                'best_protectIon_android_icon_c',
                'best_protectIon_android__c_title',
                'best_protectIon_android__c_desc',

                // Drop iOS fields
                'best_protectIon_ios_heading',
                'best_protectIon_ios_icon_a',
                'best_protectIon_ios__a_title',
                'best_protectIon_ios__a_desc',
                'best_protectIon_ios_icon_b',
                'best_protectIon_ios__b_title',
                'best_protectIon_ios__b_desc',
                'best_protectIon_ios_icon_c',
                'best_protectIon_ios__c_title',
                'best_protectIon_ios__c_desc',
            ]);
        });
    }
};
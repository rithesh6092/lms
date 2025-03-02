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
        Schema::table('courses', function (Blueprint $table) {
            // Drop foreign key constraints first
            $table->dropForeign(['category_id']);
            $table->dropForeign(['instructor_id']);
            
            // Then drop the columns
            $table->dropColumn(['instructor_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            
            // Recreate foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('instructor_id')->references('id')->on('users');
        });
    }
}; 
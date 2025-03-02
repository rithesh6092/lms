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
        Schema::table('users', function (Blueprint $table) {
            $table->string('experience')->nullable()->after('password');
            $table->tinyInteger('job_type')->nullable()->after('experience')
                ->comment('1 = Full-time, 2 = Part-time');
            $table->string('organization_name')->nullable()->after('job_type'); // Organization name
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['experience', 'job_type', 'organization_name']);
        });
    }
};

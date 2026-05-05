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
        Schema::table('photographers', function (Blueprint $table) {
            $table->json('work_days')->nullable()->after('phone');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved'])->default('pending')->after('bintang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photographers', function (Blueprint $table) {
            $table->dropColumn('work_days');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};

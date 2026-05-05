<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'booking_code')) {
                $table->string('booking_code')->unique()->after('user_id');
            }
            if (!Schema::hasColumn('bookings', 'proof_payment')) {
                $table->string('proof_payment')->nullable();
            }
            if (!Schema::hasColumn('bookings', 'link_results')) {
                $table->string('link_results')->nullable();
            }
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};

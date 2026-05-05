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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('booking_type')->default('paket')->after('kategori'); // 'paket' | 'event'
            $table->text('event_details')->nullable()->after('booking_type');    // detail acara custom
            $table->string('estimasi_durasi')->nullable()->after('event_details'); // e.g. '3 Jam', 'Full Day'
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['booking_type', 'event_details', 'estimasi_durasi']);
        });
    }
};

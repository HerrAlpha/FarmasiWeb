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
        Schema::create('riwayat_minums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id_pasien')->constrained('data_pasiens')->onDelete('cascade');
            // foreign id jadwal
            $table->foreignId('data_id_jadwal_obat')->constrained('data_jadwal_obats')->onDelete('cascade');
            $table->string('status_minum');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_minums');
    }
};

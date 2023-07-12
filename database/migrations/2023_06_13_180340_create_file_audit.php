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
        Schema::create('file_audit', function (Blueprint $table) {
            $table->id();
            $table->string('parameter_standar_ruang_lingkup')->nullable();
            $table->string('laporan_keuangan')->nullable();
            $table->string('laporan_operasional')->nullable();
            $table->string('laporan_kepatuhan')->nullable();
            $table->string('laporan_temuan_rekomendasi')->nullable();
            $table->string('laporan_rencana_tindak_lanjut')->nullable();
            $table->string('laporan_hasil_audit')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_audit');
    }
};

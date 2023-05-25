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
        Schema::create('unit_audite', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_audit');
            $table->string('nama_ketua_tim');
            $table->string('nip_ketua_tim');
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_prodi');
            // $table->unsignedBigInteger('id_ruang_lingkup');
            $table->timestamps();

            $table->foreign('id_periode')->references('id')->on('periode_audit');
            $table->foreign('id_prodi')->references('id')->on('unit_prodi');
            // $table->foreign('id_ruang_lingkup')->references('id')->on('riwayat_ruang_lingkup')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_audite');
    }
};

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
        Schema::create('temuan_audit', function (Blueprint $table) {
            $table->id();
            $table->text('kondisi_awal');
            $table->text('dasar_evaluasi');
            $table->text('penyebab');
            $table->text('akibat');
            $table->text('kriteria');
            $table->text('rekomendasi_follow_up');
            $table->unsignedBigInteger('id_ruang_lingkup');
            $table->unsignedBigInteger('id_parameter');
            $table->timestamps();

            $table->foreign('id_ruang_lingkup')->references('id')->on('ruang_lingkup_unit');
            $table->foreign('id_parameter')->references('id')->on('parameter_standar_ruang_lingkup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temuan_audit');
    }
};

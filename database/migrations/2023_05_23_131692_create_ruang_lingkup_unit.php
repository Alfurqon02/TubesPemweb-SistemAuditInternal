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
        Schema::create('ruang_lingkup_unit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_unit');
            // $table->unsignedBigInteger('id_ruang_lingkup');
            $table->timestamps();

            $table->foreign('id_unit')->references('id')->on('unit_audite');
            // $table->foreign('id_ruang_lingkup')->references('id')->on('riwayat_ruang_lingkup')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_lingkup_unit');
    }
};

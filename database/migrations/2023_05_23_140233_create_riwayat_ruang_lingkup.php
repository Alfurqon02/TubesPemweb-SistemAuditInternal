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
        Schema::create('riwayat_ruang_lingkup', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parameter');
            $table->unsignedBigInteger('id_temuan');
            $table->timestamps();

            $table->foreign('id_parameter')->references('id')->on('parameter_standar_ruang_lingkup');
            $table->foreign('id_temuan')->references('id')->on('temuan_audit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_ruang_lingkup');
    }
};

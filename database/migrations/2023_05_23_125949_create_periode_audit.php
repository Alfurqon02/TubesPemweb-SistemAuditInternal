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
        Schema::create('periode_audit', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_audit');
            $table->string('no_sk_tugas_audit');
            $table->string('file_sk')->nullable();
            $table->date('tanggal_sk');
            $table->string('nama_ketua_spi');
            $table->string('nip_ketua_spi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_audit');
    }
};

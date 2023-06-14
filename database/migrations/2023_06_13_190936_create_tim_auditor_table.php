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
        Schema::create('tim_auditor', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tanggal_audit');
            $table->string('nama_ketua_tim');
            $table->string('nip_ketua_tim');
            $table->unsignedBigInteger('id_unit_audit');
            $table->timestamps();

            $table->foreign('id_unit_audit')->references('id')->on('unit_audit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_auditors');
    }
};

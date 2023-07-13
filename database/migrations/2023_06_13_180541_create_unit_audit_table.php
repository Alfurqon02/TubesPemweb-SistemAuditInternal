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
        Schema::create('unit_audit', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_audit');
            $table->unsignedBigInteger('id_periode_audit');
            $table->unsignedBigInteger('id_unit');
            $table->unsignedBigInteger('id_tim_auditor');
            $table->unsignedBigInteger('id_file_audit')->nullable();
            $table->boolean('is_closed')->default(0);
            $table->timestamps();

            $table->foreign('id_periode_audit')->references('id')->on('periode_audit');
            $table->foreign('id_unit')->references('id')->on('unit');
            $table->foreign('id_tim_auditor')->references('id')->on('tim_auditor');
            $table->foreign('id_file_audit')->references('id')->on('file_audit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_audits');
    }
};

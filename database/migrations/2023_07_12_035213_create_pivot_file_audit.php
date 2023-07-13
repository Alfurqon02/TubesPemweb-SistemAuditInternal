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
        Schema::create('jenis_file_audit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_unit_audit');
            $table->unsignedBigInteger('id_jenis_file');
            $table->timestamps();

            $table->foreign('id_unit_audit')->references('id')->on('unit_audit');
            $table->foreign('id_jenis_file')->references('id')->on('jenis_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_file_audit');
    }
};

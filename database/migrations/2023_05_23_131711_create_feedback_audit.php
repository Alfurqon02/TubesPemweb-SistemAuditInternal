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
        Schema::create('feedback_audit', function (Blueprint $table) {
            $table->id();
            $table->text('klarifikasi');
            $table->date('tanggal_kesanggupan_penyelesaian');
            $table->unsignedBigInteger('id_temuan');
            $table->timestamps();

            $table->foreign('id_temuan')->references('id')->on('temuan_audit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_audit');
    }
};

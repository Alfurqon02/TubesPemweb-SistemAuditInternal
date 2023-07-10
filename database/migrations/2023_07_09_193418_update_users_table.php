<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('id_role')->nullable()->after('nip');
        $table->foreign('id_role')->references('id')->on('roles')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['id_role']);
        $table->dropColumn('id_role');
    });
}

};
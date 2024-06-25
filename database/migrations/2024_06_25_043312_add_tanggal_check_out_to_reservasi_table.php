<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalCheckOutToReservasiTable extends Migration
{
    public function up()
    {
        Schema::table('reservasi', function (Blueprint $table) {
            $table->dateTime('tanggal_check_out')->nullable();
        });
    }

    public function down()
    {
        Schema::table('reservasi', function (Blueprint $table) {
            $table->dropColumn('tanggal_check_out');
        });
    }
}

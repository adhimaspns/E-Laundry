<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('no_transaksi');
            $table->string('nama_customer');
            $table->string('pkt_lndry_id');
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->integer('ongkir')->nullable();
            $table->string('status')->nullable();
            $table->integer('grand_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}

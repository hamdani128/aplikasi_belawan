<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPhgtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_phgts', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->date('tanggal');
            $table->string('jam');
            $table->integer('pendapatan');
            $table->integer('bermalam')->nullable();
            $table->foreignId('kendaraan_id');
            $table->foreignId('surat_id');
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
        Schema::dropIfExists('transaction_phgts');
    }
}

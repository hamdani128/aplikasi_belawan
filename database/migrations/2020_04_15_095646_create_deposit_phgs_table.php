<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositPhgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit_phgs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('total_kendaraan')->nullable();
            $table->integer('acit')->nullable();
            $table->integer('bulking')->nullable();
            $table->integer('pko')->nullable();
            $table->integer('olin')->nullable();
            $table->integer('cpo')->nullable();
            $table->integer('total_malam')->nullable();
            $table->integer('total_pendapatan')->nullable();
            $table->integer('total_pengeluaran')->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('deposit_phgs');
    }
}

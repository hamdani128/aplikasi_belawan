<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionSmartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_smarts', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->date('tanggal');
            $table->string('jam');
            $table->integer('p_langsung')->nullable();
            $table->integer('p_bulking')->nullable();
            $table->integer('pendapatan');
            $table->integer('bermalam')->nullable();
            $table->foreignId('surat_id');
            $table->foreignId('kendaaraan_id');
            $table->foreignId('bermalam_id')->nullable();
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
        Schema::dropIfExists('transaction_smarts');
    }
}

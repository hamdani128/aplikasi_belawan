<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetincomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('netincomes', function (Blueprint $table) {
            $table->id();
            $table->integer('pemasukkan');
            $table->integer('pengeluaran');
            $table->integer('setoran');
            $table->integer('forum');
            $table->integer('pendapatan_bersih');
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
        Schema::dropIfExists('netincomes');
    }
}

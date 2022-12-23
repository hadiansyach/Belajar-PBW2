<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userIdPetugas');
            $table->foreignId('userIdPeminjam');
            $table->date('tanggalPinjam');
            $table->date('tanggalSelesai')->nullable();
            $table->timestamps();

            $table->foreign('userIdPetugas')->references('id')
            ->on('users')->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('userIdPeminjam')->references('id')
            ->onUpdate('cascade')
            ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

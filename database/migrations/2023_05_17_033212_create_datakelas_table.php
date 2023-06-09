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
        Schema::create('datakelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 25);
            $table->BigInteger('tingkat_kelas')->unsigned();
            $table->BigInteger('use_kelas')->default(0);
            $table->BigInteger('terisi')->default(0);
            $table->timestamps();
            $table->foreign('tingkat_kelas')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datakelas');
    }
};

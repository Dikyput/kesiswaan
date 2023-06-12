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
        Schema::create('data_walikelas', function (Blueprint $table) {
            $table->id();
            $table->string('namakelas', 25);
            $table->bigInteger('guru_id')->unsigned();
            $table->bigInteger('kelas_id')->unsigned();
            $table->timestamps();
            $table->foreign('guru_id')->references('id')->on('gurus');
            $table->foreign('kelas_id')->references('id')->on('datakelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_walikelas');
    }
};

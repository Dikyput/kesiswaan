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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftar', 25)->unique();
            $table->string('nis', 25)->unique();
            $table->string('nisn', 25)->unique();
            $table->string('nik', 25)->unique();
            $table->string('fullname', 100);
            $table->string('bakat', 5);
            $table->string('sekolah', 25);
            $table->string('status', 25);
            $table->string('alamat');
            $table->bigInteger('kelas_id')->nullable()->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas');
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
        // Schema::dropIfExists('siswas');
    }
};

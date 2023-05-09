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
            $table->bigInteger('no_pendaftar')->unique();
            $table->string('nis', 50);
            $table->string('nisn', 50);
            $table->string('nik', 50);
            $table->string('fullname', 50);
            $table->string('bakat', 50);
            $table->string('sekolah', 50);
            $table->string('status', 10);
            $table->string('alamat')->nullable();
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

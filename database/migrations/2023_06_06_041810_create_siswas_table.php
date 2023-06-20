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
            $table->string('nisn', 25)->unique();
            $table->string('nik', 25)->unique();
            $table->string('nama_siswa', 100);
            $table->string('tempat_lahir', 25);
            $table->date('tgl_lahir');
            $table->string('jns_kelamin', 15);
            $table->string('agama', 15);
            $table->integer('anak_ke')->default(1);
            $table->string('alamat', 255);
            $table->string('no_tlp', 15);
            $table->string('sts_dlm_keluarga', 15);
            $table->date('tgl_diterima');
            $table->string('sekolah_asal', 50);
            $table->string('nama_ibu', 15);
            $table->string('alamat_ortu', 255);
            $table->string('foto')->default('default-passfoto.png');
            $table->string('status', 25);
            $table->string('alasan')->nullable();
            $table->bigInteger('kelas_id')->nullable()->unsigned();
            $table->foreign('kelas_id')->references('id')->on('data_walikelas');
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

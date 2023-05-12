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
        Schema::create('data_mutasi', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 50);
            $table->string('nisn', 50);
            $table->string('nik', 50);
            $table->string('fullname', 50);
            $table->string('alasan', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_mutasi');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrtusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ortus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_siswa');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('job_ayah');
            $table->string('job_ibu');
            $table->string('alamat_jl');
            $table->string('alamat_desa');
            $table->string('alamat_kec');
            $table->string('alamat_kab');
            $table->string('alamat_prov');
            $table->string('hp_ortu');
            $table->string('nama_wali');
            $table->string('job_wali');
            $table->string('alamat_wali');
            $table->string('hp_wali');
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
        Schema::dropIfExists('ortus');
    }
}

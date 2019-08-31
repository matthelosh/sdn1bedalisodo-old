<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    //
    protected $fillable = [
        'id_siswa', 'nama_ayah', 'nama_ibu', 'job_ayah', 'job_ibu', 'alamat_jl', 'alamat_desa', 'alamat_kec', 'alamat_kab', 'alamat_prov','hp_ortu', 'nama_wali', 'job_wali', 'alamat_wali', 'hp_wali'
    ];

    public function siswas(){
        return  $this->belongsTo('App\Siswa', 'id_siswa', 'nisn');
    }
}

// $table->string('nama_ayah');
//             $table->string('nama_ibu');
//             $table->string('job_ayah');
//             $table->string('job_ibu');
//             $table->string('alamat_jl');
//             $table->string('alamat_desa');
//             $table->string('alamat_kec');
//             $table->string('alamat_kab');
//             $table->string('alamat_prov');
//             $table->string('hp_ortu');
//             $table->string('nama_wali');
//             $table->string('job_wali');
//             $table->string('alamat_wali');
//             $table->string('hp_wali');

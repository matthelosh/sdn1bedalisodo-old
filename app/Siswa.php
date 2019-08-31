<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rombel;

class Siswa extends Model
{
    //
    protected $fillable = [
        'nisn', 'nis', 'nama_siswa', 'jk', 'tempat_lahir', 'tanggal_lahir', 'agama_siswa', 'alamat_siswa', 'pend_sebelumnya','id_ortu', 'id_rombel'
    ];

    public function rombel(){
       return $this->belongsTo('App\Rombel', 'id_rombel', 'kode_rombel');
    }

    public function ortu(){
        // return $this->belongsTo('App\Ortu', 'id_ortu', 'id');
        return $this->hasOne('App\Ortu','id_siswa', 'nisn');
    }

    public function nilais(){
        return $this->belongsTo('App\Siswa', 'id_siswa', 'nisn');
    }

}

// $table->string('nisn');
//             $table->string('nis');
//             $table->string('nama_siswa');
//             $table->string('jk');
//             $table->string('tempat_lahir');
//             $table->string('tanggal_lahir');
//             $table->string('agama');
//             $table->string('alamat_siswa');
//             $table->string('id_ortu');
//             $table->string('id_rombel');

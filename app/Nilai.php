<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $fillable = [
        'id_periode', 'id-semester', 'id_rombel', 'id_mapel', 'id_kd', 'id_guru', 'id_siswa', 'nilai', 'ket'
    ];

    public function Penilaian(){
        return $this->belongsTo('App\Penilaian', 'ket', 'kode_penilaian');
    }

    public function siswa(){
        return $this->belongsTo('App\Siswa', 'id_siswa', 'nisn');
    }
}

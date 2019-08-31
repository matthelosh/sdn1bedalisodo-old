<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;

class Rombel extends Model
{
    //
    protected $fillable = [
        'kode_rombel', 'nama_rombel', 'id_guru', 'id_tingkat'
    ];
    protected $table = 'rombel';
    public function siswa(){
        return $this->hasMany(Siswa, 'id_rombel', 'kode_rombel');
    }
    public function guru(){

        return $this->belongsTo('App\Guru', 'id_guru', 'nip');

    }

    public function tingkat(){
        return $this->belongsTo('App\Tingkat', 'id_tingkat', 'id');
    }
}

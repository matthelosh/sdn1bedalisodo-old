<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    //
    protected $fillable = [
        'kode_penilaian', 'jenis_penilaian', 'ket'
    ];

    public function nilai(){
        return $this->hasMany('App\Nilai', 'ket', 'kode_penilaian');
    }
}

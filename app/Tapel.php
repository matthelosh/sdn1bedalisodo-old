<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tapel extends Model
{
    //
    protected $fillable = [
        'kode_tapel', 'tahun_pelajaran', 'ket'
    ];
}

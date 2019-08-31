<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kd extends Model
{
    //
    protected $fillable = [
        'id_ki', 'kode_kd', 'teks_kd', 'id_rombel', 'id_mapel'
    ];
}

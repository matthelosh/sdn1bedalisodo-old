<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ki extends Model
{
    //
    protected $fillable = [
        'kode_ki', 'teks_ki', 'id_rombel', 'id_mapel'
    ];
}

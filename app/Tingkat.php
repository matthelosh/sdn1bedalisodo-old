<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    //
    protected $fillable = [
        'kelas', 'ket'
    ];

    public function rombel(){
        return $this->hasMany('App\Rombel', 'id_tingkat', 'id');
    }
}

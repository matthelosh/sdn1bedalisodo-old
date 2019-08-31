<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $fillable = [
        'nip', 'nama_guru', 'golongan', 'jk', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'hp', 'email','ijazah', 'jabatan', 'tmt', 'tmt_disini', 'sk_terakhir', 'status_peg', 'foto'
    ];

    protected $table = 'guru';

    public function rombel(){
        return $this->hasOne('App\Rombel', 'id_guru', 'nip');
    }
}

// $table->increments('id');
//             $table->string('nip');
//             $table->string('nama_guru');
//             $table->string('golongan');
//             $table->string('jk');
//             $table->string('tempat_lahir');
//             $table->string('tanggal_lahir');
//             $table->string('agama');
//             $table->string('ijazah');
//             $table->string('jabatan');
//             $table->string('tmt');
//             $table->string('tmt_disini');
//             $table->string('sk_terakhir');
//             $table->string('status_peg');
//             $table->timestamps();

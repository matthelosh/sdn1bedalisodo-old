<?php

namespace App\Imports;

use App\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            //Import Guru dari excel
            'nip' => $row[1],
            'nama_guru'=> $row[2],
            'golongan'=> $row[3],
            'jk'=> $row[4],
            'tempat_lahir'=> $row[5],
            'tanggal_lahir'=> $row[6],
            'agama'=> $row[7],
            'alamat'=> $row[8],
            'hp'=> $row[9],
            'email'=> $row[10],
            'ijazah'=> $row[11],
            'jabatan'=> $row[12],
            'tmt'=> $row[13],
            'tmt_disini'=> $row[14],
            'sk_terakhir'=> $row[15],
            'status_peg'=> $row[16],
            'foto' => 'null'

        ]);
    }
}

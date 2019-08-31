<?php

namespace App\Imports;

use App\Tapel;
use Maatwebsite\Excel\Concerns\ToModel;

class TapelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tapel([
            //
            'kode_tapel' => $row[1],
            'tahun_pelajaran' => $row[2],
            'ket' => $row[3]
        ]);
    }
}

<?php

namespace App\Imports;

use App\Kd;
use Maatwebsite\Excel\Concerns\ToModel;

class KdImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kd([
            //
            'id_ki' => $row[1],
            'kode_kd' => $row[2],
            'teks_kd' => $row[3],
            'id_rombel' => $row[4],
            'id_mapel' => $row[5]
        ]);
    }
}

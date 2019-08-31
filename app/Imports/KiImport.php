<?php

namespace App\Imports;

use App\Ki;
use Maatwebsite\Excel\Concerns\ToModel;

class KiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ki([
            //
            'kode_ki' => $row[1],
            'teks_ki' => $row[2],
            'id_rombel' => $row[3],
            'id_mapel' => $row[3]
        ]);
    }
}

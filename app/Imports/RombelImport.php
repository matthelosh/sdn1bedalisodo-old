<?php

namespace App\Imports;

use App\Rombel;
use Maatwebsite\Excel\Concerns\ToModel;

class RombelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rombel([
            //
            'kode_rombel' => $row[1],
            'nama_rombel' => $row[2],
            'id_guru' => $row[3]
        ]);
    }
}

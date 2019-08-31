<?php

namespace App\Imports;

use App\Tingkat;
use Maatwebsite\Excel\Concerns\ToModel;

class TingkatImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tingkat([
            //
            'kelas' => $row[1],
            'ket' => $row[2]
        ]);
    }
}

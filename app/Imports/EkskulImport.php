<?php

namespace App\Imports;

use App\Ekskul;
use Maatwebsite\Excel\Concerns\ToModel;

class EkskulImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ekskul([
            //
            'kode_ekskul' => $row[1],
            'nama_ekskul' => $row[2]
        ]);
    }
}

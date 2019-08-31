<?php

namespace App\Imports;

use App\Penilaian;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPenilaian implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penilaian([
            //
        ]);
    }
}

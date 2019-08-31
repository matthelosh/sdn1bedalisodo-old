<?php

namespace App\Imports;

use App\Semester;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSemester implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Semester([
            //
            'sem' => $row[1],
            'ket' => $row[2]
        ]);
    }
}

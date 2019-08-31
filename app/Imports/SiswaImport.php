<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            //
            'nisn' => $row[1],
            'nis' => $row[2],
            'nama_siswa' => $row[3],
            'jk' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => $row[6],
            'agama_siswa' => $row[7],
            'alamat_siswa' => $row[8],
            'pend_sebelumnya' => $row[9],
            'id_ortu' => $row[10],
            'id_rombel' => $row[11],
        ]);
    }
}

//  'nisn', 'nis', 'nama_siswa', 'jk', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat_siswa', 'id_ortu', 'id_rombel'

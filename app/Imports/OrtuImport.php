<?php

namespace App\Imports;

use App\Ortu;
use Maatwebsite\Excel\Concerns\ToModel;

class OrtuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ortu([
            //
            'id_siswa' => $row[1],
            'nama_ayah' => $row[2],
            'nama_ibu' => $row[3],
            'job_ayah' => $row[4],
            'job_ibu' => $row[5],
            'alamat_jl' => $row[6],
            'alamat_desa' => $row[7],
            'alamat_kec' => $row[8],
            'alamat_kab' => $row[9],
            'alamat_prov' => $row[10],
            'hp_ortu' => $row[11],
            'nama_wali' => $row[12],
            'job_wali' => $row[13],
            'alamat_wali' => $row[14],
            'hp_wali' => $row[15]
        ]);
    }
}

// 'id_siswa', 'nama_ayah', 'nama_ibu', 'job_ayah', 'job_ibu', 'alamat_jl', 'alamat_desa', 'alamat_kec', 'alamat_kab', 'alamat_prov','hp_ortu', 'nama_wali', 'job_wali', 'alamat_wali', 'hp_wali'

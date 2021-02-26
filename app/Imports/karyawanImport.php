<?php

namespace App\Imports;

use App\mod_presentasi_karyawan_outstanding;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class karyawanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new mod_presentasi_karyawan_outstanding([
            'nip' => $row['nip'],
            'libur' => $row['libur'],
            'ph' => $row['ph'],
            'izin' => $row['izin'],
            'alfa' => $row['alfa'],
            'sakit' => $row['sakit'],
            'cuti' => $row['cuti'],
            'terlambat' => $row['terlambat'],
            'terlambat_dgn_form' => $row['terlambat_dgn_form'], 
            'masuk' => $row['masuk'],
            'total_hari' => $row['total_hari'],
        ]);
    }
}

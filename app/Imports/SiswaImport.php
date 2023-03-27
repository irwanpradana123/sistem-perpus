<?php

namespace App\Imports;

use App\Models\Anggota;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Anggota([
            'nama' => $row[1] ?? '-',
            'nisn' => $row[2] ?? '-',
            'tempat_lahir' => $row[3] ?? '-',
            'tanggal_lahir' => $row[4] ?? '-',
            'jenis_kelamin' => $row[5] ?? '-',
            'agama' => $row[6] ?? '-',
            'alamat' => $row[7] ?? '-',
            'kelas' => $row[8] ?? '-',
        ]);
    }
}

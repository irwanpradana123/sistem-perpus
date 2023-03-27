<?php

namespace App\Imports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\ToModel;

class BukuImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Buku([
            'kode_buku' => $row[1],
            'judul' => $row[2],
            'penerbit' => $row[3],
            'tahun_terbit' => $row[4],
            'stok_buku' => $row[5]
        ]);
    }
}

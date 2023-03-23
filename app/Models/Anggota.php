<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nama',
    //     'nisn',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'jenis_kelamin',
    //     'agama',
    //     'alamat',
    //     'kelas'
    // ];

    protected $guarded = ['id'];
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}

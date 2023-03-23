<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'judul',
    //     'tingkat',
    //     'penerbit',
    //     'tahun_terbit',
    //     'stok_buku'
    // ];
    protected $guarded = ['id'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}

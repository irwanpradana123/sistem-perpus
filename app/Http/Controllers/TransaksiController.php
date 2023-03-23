<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\NullableType;

class TransaksiController extends Controller
{
    //
    public function create()
    {
        $buku = Request()->buku_id;
        $jml   = Request()->jml_buku;
        $stok = Buku::findorfail($buku)->stok_buku;
        $pengurangan = $stok - $jml;
        if ($jml > $stok) {
            return back()->withErrors(['msg' => 'Jumlah melebihi stok']);
        } elseif ($stok == 0) {
            return back()->withErrors(['msg' => 'Stok kosong']);
        } else {
            $validate = Request()->validate(
                [
                    'buku_id' => 'required',
                    'anggota_id' => 'required',
                    'no_pinjaman' => 'required',
                    'tgl_pinjam' => 'required',
                    'tgl_kembali' => 'required',
                    'jml_buku' => 'required',
                    'denda' => 'nullable',
                ],
                // [
                //     'buku_id.required' => 'Harus memasukan Data Buku',
                // ]
            );
            Transaksi::create($validate);
            Buku::findOrfail($buku)->update(['stok_buku' => $pengurangan]);
        }

        // $data = [
        //     'buku_id' => Request()->buku_id,
        //     'anggota_id' => Request()->anggota_id,
        //     'no_pinjaman' => Request()->no_pinjaman,
        //     'tgl_pinjam' => Request()->tgl_pinjam,
        //     'tgl_kembali' => Request()->tgl_kembali,
        //     'denda' => Request()->denda,
        // ];
        // dd($validate);
        return redirect('peminjaman ')->with('create', 'Data berhasil');
    }
}

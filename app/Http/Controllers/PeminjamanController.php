<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Bus;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()

    {
        $tr = Transaksi::where('status', 1)->get();

        $cl = collect($tr)->map(function ($item) {
            $now = date('Y-m-d');
            if ($item->tgl_kembali < $now) {
                $diff = Carbon::parse($now)->diffInDays($item->tgl_kembali);
                $denda = $diff * 1000;
                $item->denda = $denda;
                $item->save();
            }
            return $item;
        });
        $peminjaman = Transaksi::with('anggota', 'buku')->get();
        return view('transaksi.peminjaman.index', compact('peminjaman'));
    }
    public function create()
    {
        $peminjaman = Transaksi::with('anggota', 'buku')->get();
        $anggota = Anggota::all();
        $buku = Buku::all();
        $count = count(Transaksi::wheredate('created_at', date('Y-m-d'))->get());
        $inc = (int)substr($count, -1) + 1;
        $kode = 'PNJ-' . date('ymd') . $inc;
        return view('transaksi.peminjaman.create', compact('peminjaman', 'anggota', 'buku', 'kode'));
    }
    public function edit($id)
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $tr = Transaksi::findOrfail($id);
        return view('transaksi.peminjaman.edit', compact('tr', 'anggota', 'buku'));
    }

    public function update($id)
    {
        // $anggota = Anggota
        $jml = Request()->jml_buku;
        $buku = Request()->buku_id;
        $stok = Buku::find($buku)->stok_buku;
        $sum = $jml + $stok;
        $validate = Request()->validate(
            [
                'buku_id' => 'required',
                'anggota_id' => 'required',
                'no_pinjaman' => 'required',
                'tgl_pinjam' => 'required',
                'tgl_kembali' => 'required',
                'jml_buku' => 'required',
                'status' => 'required',
                'denda' => 'nullable',
            ],
            // [
            //     'buku_id.required' => 'Harus memasukan Data Buku',
            // ]
        );
        Transaksi::find($id)->update($validate);
        Buku::find($buku)->update(['stok_buku' => $sum]);
        return redirect()->route('pengembalian');
    }
}

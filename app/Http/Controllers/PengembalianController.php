<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengembalian = Transaksi::with('anggota', 'buku')->get();
        return view('transaksi.pengembalian.index', compact('pengembalian'));
    }

    public function test()
    {
        //
    }
}

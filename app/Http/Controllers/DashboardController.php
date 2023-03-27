<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count_anggota = Anggota::count();
        $count_buku = Buku::count();
        $transaksi = Transaksi::all();
        return view(
            'dashboard.index',
            compact('count_anggota', 'count_buku', 'transaksi')
        );
    }
}

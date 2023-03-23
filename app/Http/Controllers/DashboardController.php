<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count_anggota = Anggota::count();
        $count_buku = Buku::count();

        return view(
            'dashboard.index',
            compact('count_anggota', 'count_buku')
        );
    }
}

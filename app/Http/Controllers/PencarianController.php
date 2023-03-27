<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class PencarianController extends Controller
{
    public function index(Request $request)
    {

        // dd(request('search'));
        if ($request->has('search')) {
            $bukus = Buku::where('judul', 'LIKE', '%' . $request->search . '%')
                ->orWhere('kode_buku', 'Like', '%' . $request->search . '%')->get();
        } else {
            $bukus = Buku::get();
        }
        return view('pencarian.index', compact('bukus'));
    }
}

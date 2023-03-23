<?php

namespace App\Http\Controllers;

use Nette\Utils\Json;
use App\Models\Transaksi;
use App\Exports\DataExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{

    public function index()
    {
        $laporan = Transaksi::with('buku', 'anggota')->get();
        return view('laporan.index', compact('laporan'));
    }
    public function export()
    {
        $tgl_awal = Request()->tgl_awal;
        $tgl_akhir = Request()->tgl_akhir;
        // // $data = Transaksi::where([
        // //     ['tgl_pinjam', '>=', $tgl_awal],
        // //     ['tgl_pinjam', '<=', $tgl_akhir]
        // // ])->get();

        // return Excel::download(new DataExport($tgl_awal, $tgl_akhir), 'Laporan Transaksi.xlsx');
        // return (new InvoicesExport)->download('invoices.xlsx');
        // return response()->json($data);

        return Excel::download(new DataExport($tgl_awal,$tgl_akhir), 'Laporan Transaksi '.$tgl_awal.'-'.$tgl_akhir.' .xlsx');

    }
}

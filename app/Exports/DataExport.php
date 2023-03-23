<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($tgl_awal, $tgl_akhir)
    {
        $this->awal = $tgl_awal;
        $this->akhir = $tgl_akhir;
    }
    // public function collection()
    // {
    //     return Transaksi::where([
    //         ['tgl_pinjam', '>=', $this->awal],
    //         ['tgl_pinjam', '<=', $this->akhir]
    //     ])->get();
    // }

    public function view(): View
    {
        $data = Transaksi::where([
                ['tgl_pinjam', '>=', $this->awal],
                ['tgl_pinjam', '<=', $this->akhir]
            ])->get();

        $denda =Transaksi::pluck('denda');
        $count=0;
        foreach($denda as $d){
            $count += $d;
        }
        return view('export',compact('data','count'));
    }

}

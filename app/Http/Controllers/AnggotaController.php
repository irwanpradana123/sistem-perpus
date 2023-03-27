<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Anggota\AnggotaCreateRequest;
use App\Http\Requests\Anggota\AnggotaUpdateRequest;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $anggotas = Anggota::where('nama', 'LIKE', '%' . $request->search . '%')
        //         ->orWhere('nisn', 'Like', '%' . $request->search . '%')->get();
        // } else {
        //     $anggotas = Anggota::get();
        // }
        $anggotas = Anggota::get();

        return view('anggotas.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggotaCreateRequest $request)
    {
        $anggota = Anggota::create($request->validated());

        return redirect()
            ->route('anggotas.show', $anggota)
            ->with('success', 'Data anggota berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        return view('anggotas.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        return view('anggotas.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(AnggotaUpdateRequest $request, Anggota $anggota)
    {
        $anggota->update($request->validated());

        return redirect()
            ->route('anggotas.show', $anggota)
            ->with('success', 'Data anggota berhasil di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()
            ->route('anggotas.index')
            ->with('success', 'Data anggota berhasil di hapus');
    }
    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        // menangkap file excel
        $file = $request->file('file');
        // membuat nama file unik
        $nama_file = $file->getClientOriginalName();
        // upload ke folder file_siswa di dalam folder public
        $file->move('data_siswa', $nama_file);
        // import data
        Excel::import(new SiswaImport, public_path('/data_siswa/' . $nama_file));
        // Excel::import(new UsersImport, $file);
        // alihkan halaman kembali
        return redirect('/anggotas')->with('success', 'Berhasil Mengimport Data Siswa');
        // dd($nama_file);
    }

    public function deleteAll()
    {

        Anggota::where('id', 'like', '%%')->delete();

        return redirect()
            ->route('anggotas.index')
            ->with('delete', 'Semua data anggota berhasil di hapus');
    }
}

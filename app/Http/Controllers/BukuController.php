<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buku\BukuCreateRequest;
use App\Http\Requests\Buku\BukuUpdateRequest;
use App\Imports\BukuImport;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $bukus = Buku::where('judul', 'LIKE', '%' . $request->search . '%')
        //         ->orWhere('tingkat', 'Like', '%' . $request->search . '%')->get();
        // } else {
        //     $bukus = Buku::get();
        // }

        $bukus = Buku::get();

        return view('bukus.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuCreateRequest $request)
    {
        $buku = Buku::create($request->validated());

        return redirect()
            ->route('bukus.show', $buku)
            ->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('bukus.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('bukus.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(BukuUpdateRequest $request, Buku $buku)
    {
        $buku->update($request->validated());

        return redirect()
            ->route('bukus.show', $buku)
            ->with('success', 'Data postingan berhasil di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()
            ->route('bukus.index')
            ->with('success', 'Data buku berhasil di hapus');
    }

    public function importBuku(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        // menangkap file excel
        $file = $request->file('file');
        // membuat nama file unik
        $nama_file = $file->getClientOriginalName();
        // upload ke folder file_siswa di dalam folder public
        $file->move('data_buku', $nama_file);
        // import data
        Excel::import(new BukuImport, public_path('/data_buku/' . $nama_file));
        // Excel::import(new UsersImport, $file);
        // alihkan halaman kembali
        return redirect('/bukus')->with('success', 'Berhasil Mengimport Data Siswa');
        // dd($nama_file);
    }

    public function deleteBook()
    {
        Buku::where('id', 'like', '%%')->delete();

        return redirect()
            ->route('bukus.index')
            ->with('delete', 'Semua data buku berhasil di hapus');
    }
}

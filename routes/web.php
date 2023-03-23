<?php

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Transaksi;
use PHPUnit\Event\Tracer\Tracer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/export', function () {
    return view('export');
});


Route::get('/tes', function () {
    // $date = Transaksi::pluck('created_at')->get();
    // $tr = Transaksi::wheredate('created_at', date('Y-m-d'))->get();
    // foreach ($tr as $b) {
    //     $date[] = date('Y-m-d', strtotime($b->created_at));
    // }
    // // $count = Transaksi::where('created_at', date('Y-m-d'))->get();
    // $iterasi = (int)substr(1, -1) + 1;
    // $buku = 1;
    // $tgl_awal = '2023-03-10';
    // $tgl_akhir = '2023-03-20';
    // $stok = Transaksi::where([
    //     ['tgl_pinjam', '>=', $tgl_awal],
    //     ['tgl_pinjam', '<=', $tgl_akhir]
    // ])->get();
    $tes=auth()->users()->password;
    return response()->json($tes);
});

Route::get('/denda', function () {
    $tr = Transaksi::where('status', 1)->get();
    // foreach ($tr as $t) {
    //     $date[] = $t->tgl_kembali;
    // }
    // $cl = collect($date)->map(function ($item) {
    //     if ($item <= date('Y-m-d')) {
    //         // $item->tgl_kembali;
    //     }
    //     return $item;
    // });
    // foreach ($tr as $a) {
    //     if (Transaksi::wheredate('tgl_kembali', '<', date('Y-m-d'))->get()) {
    //         $bb[] = $a;
    //     }
    // }
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
    // $a = '2023-03-13';
    // $b = '2023-03-16';
    // $diff = Carbon::parse($b)->diffInDays($a);
    // return response()->json($diff);
});

// Route::get('app', function () {
//     return view('dashboard.index');
// })->middleware('auth');

// Route::get('user', function () {
//     return view('user.index');
// })->middleware('auth');

Route::get('user', [UserController::class, 'index'])->middleware('auth');
Route::post('user', [UserController::class, 'update'])->middleware('auth')->name('user.update');


Route::get('app', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Route::get('/search', function () {
//     return view('pencarian.index');
// })->middleware('auth');
Route::get('/search', [PencarianController::class, 'index'])->middleware('auth')->name('search');


Route::resource('/bukus', BukuController::class);
Route::resource('/anggotas', AnggotaController::class)->middleware('auth');



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');

Route::get('/tambah-peminjaman', [PeminjamanController::class, 'create'])->name('index.create.transaksi');
Route::post('/peminjaman', [TransaksiController::class, 'create'])->name('create.transaksi');


Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');

Route::post('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');


Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/export', [LaporanController::class, 'export'])->name('export');

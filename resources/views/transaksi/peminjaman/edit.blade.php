@extends('sistem.app')
@section('title', 'Edit Peminjaman')

@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content')
    <h1>Halaman Edit</h1>
    <div class="container-fluid">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nambah Data Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('peminjaman.update', $tr->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>No Pinjam</label>
                                <input type="text" class="form-control" name="no_pinjaman" value="{{ $tr->no_pinjaman }}"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10">
                            <label>Anggota<span class="text-danger">*</span></label>
                            <select class="form-control select2bs4 @error('anggota_id') is-invalid @enderror"
                                name="anggota_id" style="width: 100%;">
                                {{-- <option value="{{ old('anggota_id', $tr->anggota_id) }}" selected>--Pilih Nama
                                    Anggota--</option> --}}
                                <option value="">--Pilih Nama
                                    Anggota--</option>
                                @foreach ($anggota as $pin)
                                    <option value="{{ $pin->id }}" {{ $pin->id == $tr->anggota_id ? 'selected' : '' }}>
                                        {{ $pin->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('anggota_id')
                                <div class="form-text text-danger">data belum diisi!</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <label>Buku <span class="text-danger">*</span></label>
                            <select class="form-control select2bs4  @error('buku_id') is-invalid @enderror" name="buku_id"
                                style="width: 100%;">
                                <option value="" selected>--Pilih Buku/kode
                                    Buku/Stok--</option>
                                @foreach ($buku as $buk)
                                    <option value="{{ $buk->id }}" {{ $buk->id == $tr->buku_id ? 'selected' : '' }}>
                                        {{ $buk->judul }}/{{ $buk->kode_buku }}
                                        /{{ $buk->stok_buku }}
                                    </option>
                                @endforeach
                            </select>
                            @error('buku_id')
                                <div class="form-text text-danger">data belum diisi!</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tanggal Pinjam <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tgl_pinjam')is-invalid @enderror"
                                    name="tgl_pinjam" value="{{ $tr->tgl_pinjam }}">
                                @error('tgl_pinjam')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tanggal Kembali <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="tgl_kembali"
                                    value="{{ $tr->tgl_kembali }}">
                                @error('tgl_kembali')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Jumlah Buku <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('jml_buku')
                                    is-invalid
                            @enderror"
                                    name="jml_buku" value="{{ $tr->jml_buku }}">
                                @error('jml_buku')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                                @if ($errors->any())
                                    <div class="form-text text-danger">{{ $errors->first() }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <label>Status <span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <!-- text input -->

                                <div class="d-flex ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                            value="{{ $tr->status }}"{{ $tr->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">Dipinjam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineRadio2" value="2"
                                            name="status">
                                        <label class="form-check-label" for="inlineRadio2">Dikembalikan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Denda <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('denda')
                                    is-invalid
                            @enderror"
                                    name="denda" value="{{ $tr->denda }}" readonly>
                                @error('denda')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                                {{-- @if ($errors->any())
                                    <div class="form-text text-danger">{{ $errors->first() }}</div>
                                @endif --}}
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Select2 -->
    <script src="{{ asset('adminlte') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush

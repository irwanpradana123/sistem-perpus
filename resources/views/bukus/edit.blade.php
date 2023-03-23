@extends('sistem.app')
@section('title', 'Data Buku')
@section('title1', 'Dashboard')
@section('title2', 'Edit Data Buku ')
@push('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admilte') }}/dist/css/adminlte.min.css">
@endpush

@section('content')
    <h1>Edit buku</h1>
    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Data buku</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('bukus.update', $buku->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input type="text" class="form-control" name="kode_buku"
                                value="{{ old('kode_buku', $buku->kode_buku) }}">
                            @error('kode_buku')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul"
                                value="{{ old('judul', $buku->judul) }}">
                            @error('judul')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit"
                                value="{{ old('penerbit', $buku->penerbit) }}">
                            @error('penerbit')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tahun terbit</label>
                            <input type="text" class="form-control" name="tahun_terbit"
                                value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                            @error('tahun_terbit')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" class="form-control" name="stok_buku"
                                value="{{ old('stok_buku', $buku->stok_buku) }}">
                            @error('stok_buku')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Update Submit</button>
                    <a href="{{ route('bukus.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>

        @endsection
        @push('js')
            <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- bs-custom-file-input -->
            <script src="{{ asset('adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
            <!-- AdminLTE App -->
            {{-- <script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script> --}}

            <script>
                $(function() {
                    bsCustomFileInput.init();
                });
            </script>
        @endpush

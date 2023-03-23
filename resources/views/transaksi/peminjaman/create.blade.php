@extends('sistem.app')
@section('title', 'Tambah Peminjaman')

@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nambah Data Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('create.transaksi') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>No Pinjam</label>
                                <input type="text" class="form-control" name="no_pinjaman" value="{{ $kode }}"
                                    readonly>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="form-text">data belum diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-sm-10">
                            <label>Anggota<span class="text-danger">*</span></label>
                            <select class="form-control select2bs4 @error('anggota_id') is-invalid @enderror"
                                name="anggota_id" style="width: 100%;">
                                <option value="" selected>--Pilih Nama Anggota--</option>
                                @foreach ($anggota as $pin)
                                    <option value="{{ $pin->id }}">{{ $pin->nama }}</option>
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
                            <select class="form-control select2bs4  @error('buku_id') is-invalid @enderror"
                                name="buku_id"style="width: 100%;">
                                <option value="" selected>--Pilih Buku/kode Buku/Stok--</option>
                                @foreach ($buku as $buk)
                                    <option value="{{ $buk->id }}">{{ $buk->judul }}/{{ $buk->kode_buku }}
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
                                    name="tgl_pinjam" value="{{ old('tgl_pinjam') }}">
                                @error('tgl_pinjam')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row col-sm-10">
                <!-- Date -->

                <label>Tanggal Lahir</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="text"
                        class="form-control datetimepicker-input" data-target="#reservationdate" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                @error('tanggal_lahir')
                    <div class="form-text"> Data belum diisi</div>
                @enderror
            </div> --}}
                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tanggal Kembali <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="tgl_kembali"
                                    value="{{ old('tgl_kembali') }}">
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
                                    name="jml_buku" value="{{ old('jml_buku') }}">
                                @error('jml_buku')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                                @if ($errors->any())
                                    <div class="form-text text-danger">{{ $errors->first() }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
                        @error('agama')
                            <div class="form-text">data belum diisi</div>
                        @enderror
                    </div>
                </div>
            </div> --}}

                    {{-- <div class="row">
                <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}">
                        @error('kelas')
                            <div class="form-text">data belum diisi</div>
                        @enderror
                    </div>
                </div>
            </div> --}}

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

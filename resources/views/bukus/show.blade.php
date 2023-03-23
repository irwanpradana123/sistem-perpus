@extends('sistem.app')
@section('title', 'Data Buku')
@section('title1', 'Dashboard')
@section('title2', 'Data Buku')

@push('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
@endpush

@section('content')

    <h1>View info buku</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data buku</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <td>Kode Buku</td>
                                <td>{{ $buku->kode_buku }}</td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td>{{ $buku->judul }}</td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td>{{ $buku->penerbit }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td>{{ $buku->tahun_terbit }}</td>
                            </tr>
                            <tr>
                                <td>Stok Buku</td>
                                <td>{{ $buku->stok_buku }}</td>
                            </tr>

                        </tbody>
                    </table>


                </div>

                <!-- /.card-body -->
            </div>
            <a href="{{ route('bukus.index') }}" class="btn btn-info">Kembali ke data buku</a>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
@endsection

@push('js')
    <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
@endpush

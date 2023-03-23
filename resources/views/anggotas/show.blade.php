@extends('sistem.app')
@section('title', 'Data Anggota')
@section('title1', 'Dashboard')
@section('title2', 'Data Anggota')
@push('css')
@endpush

@section('content')
    <h1>View info Anggota</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data anggota</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $anggota->nama }}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>{{ $anggota->nisn }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>{{ $anggota->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>{{ $anggota->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{ $anggota->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>{{ $anggota->agama }}</td>
                            </tr>
                            <tr>
                                <td>kelas</td>
                                <td>{{ $anggota->kelas }}</td>
                            </tr>

                        </tbody>
                    </table>


                </div>

                <!-- /.card-body -->
            </div>
            <a href="{{ route('anggotas.index') }}" class="btn btn-info">Kembali ke data anggota</a>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
@endsection

@push('js')
@endpush

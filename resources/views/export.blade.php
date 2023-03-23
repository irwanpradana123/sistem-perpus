<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Data Laporan</title>
    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome1/oke1/css/all.min.css">
</head>
<style>
    /* .container {
        margin: 0px;
    } */
</style>

<body>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No Pinjam</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Tanggal Dikembalikan</th>
                    <th scope="col">Denda</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $a)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $a->no_pinjaman }}</td>
                        <td>{{ $a->anggota->nama }}</td>
                        <td>{{ $a->buku->judul }}</td>
                        <td>{{ $a->tgl_pinjam }}</td>
                        <td>{{ $a->tgl_kembali }}</td>
                        <td>{{ $a->updated_at }}</td>
                        <td>{{ $a->denda }}</td>
                        <td>
                            @if ($a->status == 1)
                                Dipinjam
                            @else
                                Telah Dikembalikan
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="row">SUM</th>
                    <td colspan="7">Total Denda</td>
                    <td>{{ $count }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>

</html>

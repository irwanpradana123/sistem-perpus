@extends('sistem.app')
@section('title', 'Peminjaman')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
    @if (session('create'))
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Berhasil menambahkan data peminjaman</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
        </div>
        <!-- /.card -->
    @endif
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Total Peminjaman : <span
                        class="text-danger">{{ count($peminjaman->where('status', 1)) }} </span> </h3>
                <a href="{{ route('index.create.transaksi') }}" class="btn btn-info">Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Pinjam</th>
                        <th>Nama</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Balik</th>
                        <th>Status</th>
                        <th>Jumlah Buku</th>
                        <th>Denda</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman->where('status', 1) as $pinjam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pinjam->no_pinjaman }}</td>
                            <td>{{ $pinjam->anggota->nama }}</td>
                            <td>{{ $pinjam->buku->judul }}</td>
                            <td>{{ $pinjam->tgl_pinjam }}</td>
                            <td>{{ $pinjam->tgl_kembali }}</td>
                            <td>
                                <div class="badge-btn badge-warning text-center">
                                    {{ $pinjam->status = 1 ? 'Dipinjam' : 'Telah Kembali' }}
                                </div>
                            </td>
                            <td>{{ $pinjam->jml_buku }}</td>
                            <td>Rp.{{ $pinjam->denda ?? '-' }}</td>
                            <td>
                                <button type="" class="btn btn-info"><i class="fa fa-arrow-pointer"></i></button>
                                <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-success"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

@push('js')
    <script src="{{ asset('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush

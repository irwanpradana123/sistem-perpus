@extends('sistem.app')
@section('title', 'Laporan')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Cetak Data Laporan <span class="text-danger"> </span> </h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-print">
                    <i class="fa fa-print"> </i> Unduh Data
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Pinjam</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $lapor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lapor->no_pinjaman }}</td>
                            <td>{{ $lapor->buku->judul }}</td>
                            <td>{{ $lapor->anggota->nama }}</td>
                            <td>{{ $lapor->anggota->nisn }}</td>
                            <td>{{ $lapor->anggota->jenis_kelamin }}</td>
                            <td>
                                @if ($lapor->status == 1)
                                    <span class="badge badge-warning">Dipinjam</span>
                                @else
                                    <span class="badge badge-success">Telah Dikembalikan</span>
                                @endif
                            </td>
                            <td>{{ $lapor->denda ?? '-' }}</td>
                            {{-- <td>{{ }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Modal Print Start --}}
    <div class="modal fade" id="modal-print">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Print Data Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('export') }}" method="GET">
                    <div class="modal-body">
                        <label for="tgl_awal">Tanggal Awal</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" />
                                </div>
                            </div>
                        </div>
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-success">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Print End --}}


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
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

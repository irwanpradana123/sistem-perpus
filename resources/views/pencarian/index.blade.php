@extends('sistem.app')
@section('title', 'Pencarian')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content mb-5">
            <div class="container-fluid">
                <h2 class="text-center display-4">Search</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="search" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" name="search"
                                    placeholder="Pencarian Buku" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun terbit</th>
                    <th scope="col">Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bukus as $cb)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cb->judul }}</td>
                        <td>{{ $cb->kode_buku }}</td>
                        <td>{{ $cb->penerbit }}</td>
                        <td>{{ $cb->tahun_terbit }}</td>
                        <td>{{ $cb->stok_buku }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Data masih kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

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
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush

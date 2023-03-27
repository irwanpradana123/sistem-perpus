@extends('sistem.app')
@section('title', 'Data Buku')
@section('title1', 'Dashboard')
@section('title2', 'Data Buku')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
@section('content')
    {{-- notifikasi form validasi --}}
    @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
    @endif
    @if (session('success'))
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Berhasil mengimport data siswa</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
        </div>
        <!-- /.card -->
    @elseif(session('delete'))
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Berhasil Menghapus data siswa</h3>

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
                <div>
                    <a href="{{ route('bukus.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Data Buku</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-import">
                        <i class="fa fa-file-import"></i> Import Data Buku
                    </button>

                </div>
                <div>
                    <a href="{{ route('deleteBook') }}" class="btn btn-danger"><i class="fa fa-trash"></i>
                        Delete
                        Buku</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            {{-- <label for="inputPassword5" class="form-label mt-3">Pencarian</label>
    <form action="{{ route('bukus.index') }}" method="GET">
        <input type="search" id="inputPassword5" name="search" class="form-control" placeholder="Pencarian"
            value="{{ request('search') }}">
    </form> --}}


            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun terbit</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bukus as $buku)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $buku->kode_buku }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->stok_buku }}</td>
                            <td class="d-flex justify-content-around ">
                                <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-magnifying-glass"></i></a>
                                <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-success"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal-delete{{ $buku->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                {{-- Modal Delete Start --}}
                                <div class="modal fade" id="modal-delete{{ $buku->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Data Buku {{ $buku->judul }}</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda ingin menghapus data Buku {{ $buku->judul }} ??</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                {{-- Modal Delete End --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Data masih kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


            {{-- Modal Import Start --}}
            <div class="modal fade" id="modal-import">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('importBuku') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data Buku</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <p class="text-danger">Silahkan Masukan File .csv,.xlx,atau .xlsx</p>

                                <div class="form-group">
                                    <input type="file" name="file"class="form-group" required>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                <button class="btn btn-success">Import</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            {{-- Modal Import End --}}
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

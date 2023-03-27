@extends('sistem.app')
@section('title', 'Data Anggota')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
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
                    <a href="{{ route('anggotas.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Data Siswa</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-import">
                        <i class="fa fa-file-import"></i> Import Data Siswa
                    </button>

                </div>
                <div>
                    <a href="{{ route('deleteAll') }}" class="btn btn-danger"><i class="fa fa-trash"></i>
                        Delete
                        Siswa</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggotas as $anggota)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->nisn }}</td>
                            <td>{{ $anggota->tempat_lahir }}</td>
                            <td>{{ date('d F Y', strtotime($anggota->tanggal_lahir)) }}</td>
                            <td>{{ $anggota->jenis_kelamin }}</td>
                            <td>{{ $anggota->agama }}</td>
                            <td>{{ $anggota->alamat }}</td>
                            <td>{{ $anggota->kelas }}</td>
                            <td class="d-flex justify-content-around ">
                                <a href="{{ route('anggotas.show', $anggota->id) }}" class="btn btn-success"><i
                                        class="fa-solid fa-magnifying-glass"></i></a>
                                <a href="{{ route('anggotas.edit', $anggota->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal-delete{{ $anggota->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                {{-- Modal Delete Start --}}
                                <div class="modal fade" id="modal-delete{{ $anggota->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Data Buku {{ $anggota->nama }}</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda ingin menghapus data anggota {{ $anggota->nama }} ??</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <form action="{{ route('anggotas.destroy', $anggota->id) }}"
                                                    method="POST">
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
                            <td colspan="10">Data masih kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Import Start --}}
    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Import Data Siswa</h4>
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

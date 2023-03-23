@extends('sistem.app')
@section('title', 'Data Anggota')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
    <a href="{{ route('anggotas.create') }}" class="btn btn-info">Buat data Anggota baru</a>
    {{-- <div>
        <label for="inputPassword5" class="form-label mt-3">Pencarian</label>
        <form action="{{ route('anggotas.index') }}" method="GET">
            <input type="search" id="inputPassword5" name="search" class="form-control"
                aria-describedby="passwordHelpBlock" placeholder="Pencarian" value="{{ request('search') }}">
        </form>
    </div> --}}


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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda ingin menghapus data anggota {{ $anggota->nama }} ??</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST">
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
                    <td colspan="5">Data masih kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>



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

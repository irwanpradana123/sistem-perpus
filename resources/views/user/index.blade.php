@extends('layouts.app')
@section('title', 'Profil Pengguna')

@section('content')
    @if (session('success'))
        <span class=""> BERHASILL!!!!</span>
    @endif
    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header ">
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Data Akun</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Ganti Password</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td>{{ auth()->user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ auth()->user()->email }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <form action="{{ route('user.update') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Passwword Lama<span class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control @error('password_last')
                                        is-invalid
                                    @enderror"
                                        name="password_last" value="{{ old('password_last') }}">
                                    @if (session('password'))
                                        <div class="form-text text-danger">Password Lama Tidak Sesuai</div>
                                    @endif
                                    @error('password_last')
                                        <div class="form-text text-danger">Wajib Diisi</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password Baru<span class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password Baru<span class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation')
                                        is-invalid
                                    @enderror"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                        <div class="form-text text-danger">data belum diisi</div>
                                    @enderror
                                </div>
                                <div class="button d-flex justify-content-between">
                                    <a href="{{ route('dashboard') }}" class="btn btn-info">Kembali ke dashboard</a>
                                    <button type="submit" class="btn btn-info"> Simpan</button>
                                </div><!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                    {{-- <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="form-group">
                                <label>Passwword Lama<span class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                    name="password" value="{{ old('password') }}">
                                @if (session('password'))
                                    <div class="form-text text-danger">data belum diisi</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password Baru<span class="text-danger">*</span></label>
                                <input type="new_password"
                                    class="form-control @error('new_password')
                                    is-invalid
                                @enderror"
                                    name="new_password" value="{{ old('new_password') }}">
                                @error('new_password')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password Baru<span class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control @error('confirm_password')
                                    is-invalid
                                @enderror"
                                    name="confirm_password" value="{{ old('confirm_password') }}">
                                @error('confirm_password')
                                    <div class="form-text text-danger">data belum diisi</div>
                                @enderror
                            </div>
                        </div> --}}
                </div>

            </div>
        </div>
        <!-- ./card -->

    </div>
@endsection

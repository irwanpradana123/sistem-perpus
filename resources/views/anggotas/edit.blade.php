@extends('sistem.app')
@section('title', 'Data Anggota')
@section('title1', 'Dashboard')
@section('title2', 'Data Anggota')
@push('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
@endpush

@section('content')
    <h1>Tambah buku</h1>
    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Data anggota</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('anggotas.update', $anggota->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama"
                                value="{{ old('nama', $anggota->nama) }}">
                            @error('nama')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" class="form-control" name="nisn"
                                value="{{ old('nisn', $anggota->nisn) }}">
                            @error('nisn')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}">
                            @error('tempat_lahir')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="row col-sm-10">
                    <!-- Date -->

                    <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="text"
                            class="form-control datetimepicker-input" data-target="#reservationdate" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('tanggal_lahir')
                        <div class="form-text"> Data belum diisi</div>
                    @enderror
                </div> --}}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control select2" name="agama" style="width: 100%;"
                                value="{{ old('agama', $anggota->agama) }}">
                                <option selected="selected">Islam</option>
                                <option>Kristen</option>
                                <option>Katolik</option>
                                <option>Hindu</option>
                                <option>Budha</option>
                            </select>
                            @error('agama')
                                <div>data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Agama</label>
                            <input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
                            @error('agama')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div> --}}


                <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat"
                                value="{{ old('alamat', $anggota->alamat) }}">
                            @error('alamat')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-10">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}">
                            @error('kelas')
                                <div class="form-text">data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control select2" name="kelas" style="width: 100%;"
                                value="{{ old('kelas', $anggota->kelas) }}">
                                <option selected="selected">1A</option>
                                <option>1B</option>
                                <option>1C</option>
                                <option>1D</option>
                                <option>2A</option>
                                <option>2B</option>
                                <option>2C</option>
                                <option>2D</option>
                                <option>3A</option>
                                <option>3B</option>
                                <option>3C</option>
                                <option>3D</option>
                                <option>6D</option>
                                <option>4A</option>
                                <option>4B</option>
                                <option>4C</option>
                                <option>4D</option>
                                <option>5A</option>
                                <option>5B</option>
                                <option>5C</option>
                                <option>5D</option>
                                <option>6A</option>
                                <option>6B</option>
                                <option>6C</option>
                                <option>6D</option>
                            </select>
                            @error('kelas')
                                <div>data belum diisi</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('anggotas.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>



        </div>
    @endsection

    @push('js')
        <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="{{ asset('adminlte') }}/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="{{ asset('adminlte') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="{{ asset('adminlte') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('adminlte') }}/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="{{ asset('adminlte') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('adminlte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="{{ asset('adminlte') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- BS-Stepper -->
        <script src="{{ asset('adminlte') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="{{ asset('adminlte') }}/plugins/dropzone/min/dropzone.min.js"></script>
        <!-- AdminLTE App -->
        {{-- <script src="../../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../dist/js/demo.js"></script>
            <!-- Page specific script --> --}}
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'L'
                });

                //Date and time picker
                $('#reservationdatetime').datetimepicker({
                    icons: {
                        time: 'far fa-clock'
                    }
                });

                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker({
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                                'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                            'MMMM D, YYYY'))
                    }
                )

                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                })

                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })

            })
            // BS-Stepper Init
            document.addEventListener('DOMContentLoaded', function() {
                window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                url: "/target-url", // Set the url
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function() {
                    myDropzone.enqueueFile(file)
                }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        </script>
    @endpush

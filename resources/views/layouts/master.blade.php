<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | KPN {{ date('Y') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Registrasi KPN" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">
    @include('layouts.head-css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .swal2-file{
            display: block;
            width: 100%;
            padding: 0.47rem 0.75rem;
            font-size: .8125rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-gray-700);
            background-color: var(--bs-custom-white);
            background-clip: padding-box;
            border: 1px solid var(--bs-input-border-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        }

        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 9999;
            top: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.8) url("<?php echo e(url('/images/loading.gif')); ?>") center no-repeat;
        }

        /* Turn off scrollbar when body element has the loading class */
        .layout-wrapper.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        .layout-wrapper.loading .overlay {
            z-index: 10000;
            display: block;
        }

        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
        font-size:30px;
            box-shadow: 2px 2px 3px #999;
        z-index:100;
        }

        .my-float{
            margin-top:16px;
        }      
    </style>
</head>

@section('body')
    <body data-sidebar="dark">

    <a class="float" onclick="history.back()">
        <i class="fas fa-arrow-left my-float"></i>
    </a>
@show
    <!-- Begin page -->
    <div id="layout-wrapper" class="layout-wrapper">
        <div class="overlay"></div>
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="row">

                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                <strong>{{ \Illuminate\Support\Facades\Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-2"></i>
                                <strong>{{ \Illuminate\Support\Facades\Session::get('error') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js')}}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('build/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('build/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
    <script>
        $('#change-password').on('submit',function(event){
            event.preventDefault();
            var Id = $('#data_id').val();
            var current_password = $('#current-password').val();
            var password = $('#password').val();
            var password_confirm = $('#password-confirm').val();
            $('#current_passwordError').text('');
            $('#passwordError').text('');
            $('#password_confirmError').text('');
            $.ajax({
                url: "{{ url('update-password') }}" + "/" + Id,
                type:"POST",
                data:{
                    "current_password": current_password,
                    "password": password,
                    "password_confirmation": password_confirm,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(response){
                    $('#current_passwordError').text('');
                    $('#passwordError').text('');
                    $('#password_confirmError').text('');
                    // Handle successful form submission here
      
                    $('#success-alert').text('Password Berhasil Diubah').fadeIn();
                // Redirect to a new page
                setTimeout(function() {
                    window.location.href = "#";
                }, 1000); 
                // Close the modal
                },
                error: function(response) {
                    $('#current_passwordError').text(response.responseJSON.errors.current_password);
                    $('#passwordError').text(response.responseJSON.errors.password);
                    $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
                    // Handle form submission error if needed
                    $('#error-alert').text('Ada Kesalahan Saat Mengupdate Password').fadeIn();
                }
               
            });
        });
    </script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    {{-- dropzone--}}
    <script src="{{ URL::asset('build/libs/dropzone/min/dropzone.min.js') }}"></script>

    <!-- Datatable init js -->
    @yield('script')
    <script src="{{ URL::asset('/build/js/pages/datatables.init.js') }}"></script>

    {{-- swal --}}
    <script src="{{ URL::asset('/build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/sweet-alerts.init.js') }}"></script>

    @stack('script-page')

    <script>
        $(document).ready(function(){
            $(document).on({
                ajaxStart: function () {
                    $(".layout-wrapper").addClass("loading");
                },
                ajaxStop: function () {
                    setTimeout(() => {
                        $(".layout-wrapper").removeClass("loading");
                    }, 1000);
                }
            });
        });
    </script>

</body>

</html>

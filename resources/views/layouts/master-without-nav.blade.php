<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | Registrasi KPN {{ date('Y') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="Sistem Pendaftaran Kegiatan KPN" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico')}}">
        @include('layouts.head-css')
        <style>
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
            .content.loading {
                overflow: hidden;
            }

            /* Make spinner image visible when body element has the loading class */
            .content.loading .overlay {
                z-index: 10000;
                display: block;
            }
        </style>
  </head>

    <body>
    @yield('body')
    <div class="content">
        <div class="overlay"></div>
        @yield('content')
    </div>


    @include('layouts.vendor-scripts')

        <script>
            $(document).ready(function(){
                $(document).on({
                    ajaxStart: function () {
                        $(".content").addClass("loading");
                    },
                    ajaxStop: function () {
                        setTimeout(() => {
                            $(".content").removeClass("loading");
                        }, 1000);
                    }
                });
            });
        </script>
    </body>
</html>
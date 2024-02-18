<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title', 'Driving School Managenment Admin Dashboard')</title>

    <link rel="shortcut icon" href="{{ asset('logo.png') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/icons/flags/flags.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/ckeditor.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins//toastr/toatr.css') }}">



    @livewireStyles
    <style>
        .noti-count {
            position: absolute;
            right: -10px;
            border-radius: 59px;
            width: 21px;
            text-align: center;
            font-size: 12px;
        }
    </style>


</head>

<body>


    <div class="main-wrapper">
        @include('Backend.inc.header')
        <div class="page-wrapper">
            @yield('content')
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('Backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/script.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/ckeditor.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/toastr/toastr.min.js') }}"></script>
    
    <script src="{{ asset('Backend/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/apexchart/chart-data.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#summernote_blog').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
            $('.summernote_blog_edit').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
            $('#summernote_blog_1').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
                toastr.success("{{ session('success') }}")
            @endif
            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
                toastr.error("{{ session('error') }}")
            @endif
           
            });

    </script>

    @yield('script')

    @livewireScripts

</body>

</html>

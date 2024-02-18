<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title', 'Student Portal - BaypassdrivingSchool')</title>

    <link rel="shortcut icon" href="{{ asset('logo.png') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/icons/flags/flags.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/simple-calendar/simple-calendar.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins//toastr/toatr.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        @include('UserSide.inc.header')
        @include('UserSide.inc.sidebar')

        <div class="page-wrapper">
            @yield('content')
        </div>

    </div>


    <script src="{{ asset('Backend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('Backend/assets/plugins/simple-calendar/jquery.simple-calendar.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/calander.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/circle-progress.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/script.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/countup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/countup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/countup/jquery.missofis-countdown.js') }}"></script>

@yield('script')
    <script>
        $(document).ready(function() {

            
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
</body>

</html>

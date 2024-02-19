<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Driving School - Account Login</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/icons/flags/flags.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/plugins//toastr/toatr.css') }}">

</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img style="height: 100%;" class="img-fluid"
                            src="https://baypassdrivingschool.com/wp-content/uploads/2023/09/Saa-WDIS-US-11122021-36640004140-banner-Blan.jpg"
                            alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login to Your Account</h1>
                            @if (session()->has('user_register'))
                                <div class="alert alert-success" role="alert">
                                    Verify Your Email. Not Recieved Email <a href="#" class="alert-link">Resend
                                        Email</a>.
                                </div>
                            @endif
                            <h2>Sign in</h2>

                            <form action="{{ route('login.account') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" type="email" name="email">
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>
                                <div class="forgotpass">
                                    <div class="remember-me">
                                        <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                            <input type="checkbox" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <a href="/register-account">Dont Have an account?</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('Backend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('Backend/assets/js/script.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/toastr/toastr.min.js') }}"></script>

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

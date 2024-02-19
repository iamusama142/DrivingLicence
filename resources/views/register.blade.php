<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Baypassdrivingschool - Register</title>

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
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                                            <img style="height: 100%;" class="img-fluid" src="https://baypassdrivingschool.com/wp-content/uploads/2023/09/Saa-WDIS-US-11122021-36640004140-banner-Blan.jpg" alt="Logo">

                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Sign Up</h1>
                            <p class="account-subtitle">Enter details to create your account</p>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="name"
                                        value="{{ old('name') }}" required>
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ old('email') }}" required>
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password" required>
                                    <span class="profile-views feather-eye toggle-password"></span>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-confirm" type="password"
                                        name="password_confirmation" required>
                                    <span class="profile-views feather-eye reg-toggle-password"></span>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" dont-have">Already Registered? <a href="/">Login</a></div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
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
</body>

</html>

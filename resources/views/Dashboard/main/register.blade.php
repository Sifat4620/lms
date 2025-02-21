<!DOCTYPE html>
<html lang="en" class="h-100" id="register-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Custom Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/modernizr.3.6.0.min.js') }}"></script>
</head>

<body class="h-100">
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
            </svg>
        </div>
    </div>

    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">
                                <!-- Logo Section -->
                                <div class="logo text-center mt-4">
                                    Library Management System
                                </div>

                                <!-- Register Form Heading -->
                                <h4 class="text-center mt-3">Create Your Account</h4>

                                <!-- Form Starts Here -->
                                <form class="m-t-30 m-b-30" method="POST" action="{{ route('register.submit') }}">
                                    @csrf

                                    <!-- Username Input -->
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Name Input -->
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password Input -->
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center m-b-15 m-t-15">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </form>
                                <!-- Form Ends Here -->

                                <!-- Alternative Option: Already have an account? -->
                                <div class="text-center">
                                    <p class="m-t-30">Already have an account? <a href="{{ route('login') }}">Login Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Common JS -->
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/custom.mini.nav.js') }}"></script>
</body>

</html>

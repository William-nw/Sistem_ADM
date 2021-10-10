<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk | Sistem Administrasi </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('Login_Src/fonts/material-icon/css/material-design-iconic-font.min.css') }} ">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('Login_Src/css/style.css') }} ">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('Login_Src/images/signin-image.jpg') }} " alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Buat Akun Baru</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Masuk</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" id="your_name" name="email" value="{{ old('email') }}" placeholder="Email"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="your_pass" name="password"  placeholder="Kata Sandi"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Ingat saya </label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('Login_Src/vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('Login_Src/js/main.js') }} "></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
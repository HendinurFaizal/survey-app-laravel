<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Register | COBLOS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
        content="PPL, Form, tugas, praktikum, proyek perangkat lunak, informatika, undip, universitas diponegoro, COBLOS"
        name="keywords" />
    <meta content="Tugas Mini Project PPL Kelas A" name="description" />
    <meta property="og:title" content="Kelas A" />
    <meta property="og:description" content="Tugas Mini Project PPL Kelas A" />
    <meta name="title" content="Kelas A" />
    <meta name="description" content="Tugas Mini Project PPL Kelas A" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../vendor/sb-login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="../vendor/sb-login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../vendor/sb-login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('../vendor/sb-login/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST" autocomplete="on"
                    action="{{ route('register') }}">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>

                    @csrf
                    @if (session('error'))
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Nama</span>
                        <input class="input100" placeholder="Nama" type="text" name="name" required autofocus>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Email</span>
                        <input class="input100" placeholder="Email" type="email" name="email" required>
                        <span class="focus-input100" data-symbol="&#xf2b6;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" placeholder="Password" type="password" name="password" required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <br><br>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn" style="float: right" name="submit"
                                value="submit">Masuk</button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-10">
                        <span>
                            <a href="{{ route('homepage') }}">Kembali</a>
                        </span>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            <a href="{{ route('login') }}">Sudah punya akun? Masuk!</a>
                        </span>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="../vendor/sb-login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/sb-login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/sb-login/vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/sb-login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/sb-login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/sb-login/vendor/daterangepicker/moment.min.js"></script>
    <script src="../vendor/sb-login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/sb-login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/sb-login/js/main.js"></script>

</body>

</html>

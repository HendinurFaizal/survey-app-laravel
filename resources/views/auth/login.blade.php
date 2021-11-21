<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login | COBLOS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="PPL, Form, tugas, praktikum, proyek perangkat lunak, informatika, undip, universitas diponegoro, COBLOS"
        name="keywords" />
    <meta content="Tugas Mini Project PPL Kelas A" name="description" />
    <meta property="og:title" content="Kelas A" />
    <meta property="og:description" content="Tugas Mini Project PPL Kelas A" />
    <meta name="title" content="Kelas A" />
    <meta name="description" content="Tugas Mini Project PPL Kelas A" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
</head>

<body style="background-color: #1427d6">
    <br>
    <div class="container mt-5">
        <div class="container">
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                                <h1 class="text-white">Selamat Datang!</h1>
                                <p class="text-lead text-white">Masuk ke akun <span class="fw-bold">COBLOS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card" style="background-color: rgb(191, 248, 245)">
                        <div class="card-header">
                            <p class="fs-3 fw-bold">Login</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" autocomplete="on" action="{{ route('login') }}">
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
                                <div class="form-group mb-3">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">📧</span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" name="email"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">🔑</span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password"
                                            name="password" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm fw-bold m-2"
                                        style="float: right" name="submit" value="submit">Masuk</button>
                                    <a class="btn btn-secondary btn-sm m-2" href="{{ route('homepage') }}"
                                        style="float: right">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="{{ route('register') }}" class="text-light fs-5"><small>Belum punya akun? Daftar!</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>COBLOS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="PPL, Form, tugas, praktikum, proyek perangkat lunak, informatika, undip, universitas diponegoro"
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

<body>
    <div class="container">
        <div class="card-body">
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
        </div>
        <h2>Home</h2>
        <br>
        <div class="body">
            <h5 class="text-secondary fw-bold">Daftar Jadi Surveyor!</h5>
            <a href="{{ route('register') }}" class="btn btn-primary mb-3">Register</a>
            <h5 class="text-secondary fw-bold">Masuk!</h5>
            <a href="{{ route('login') }}" class="btn btn-primary mb-2">Login</a>
            <h5 class="text-secondary fw-bold">Dashboard</h5>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mb-2">Dashboard</a>
            <h5 class="text-secondary fw-bold">Bikin Survey!</h5>
            <a href="{{ route('view.create.survey') }}" class="btn btn-primary mb-2">Buat Survey</a>
            <h5 class="text-secondary fw-bold">Bikin Voting!</h5>
            <a href="{{ route('view.create.vote') }}" class="btn btn-primary mb-2">Buat Voting</a>
        </div>
    </div>
</body>

</html>

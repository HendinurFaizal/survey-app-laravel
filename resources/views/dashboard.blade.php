<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard | COBLOS</title>
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
        <h2>Dashboard</h2>
        <br>
        <div class="body">
            <h5 class="text-secondary fw-bold">Selamat Datang <span class="text-dark">{{ $user }} 😀</span>
            </h5>
            <form method="POST" autocomplete="on" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link fs-5 fw-bold btn btn-sm btn-danger"><span class="text-light ">Keluar</span></button>
            </form>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Show Vote | COBLOS</title>
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

<body style="background-color: #1427d6">
    <div class="container mt-5 col-md-5">
        <div class="card row justify-content-center">
            <div class="card-header fw-bold fs-3 mb-1">{{ $vote->title }}</div>
            <div class="card-body fs-6 mb-2">{{ $vote->question }}</div>
            <hr>

            <div class="card-body mt-3">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <div>{{ $options[0]->option }}</div>
                        <div><strong>{{ $option1 }}</strong> responden</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>{{ $options[1]->option }}</div>
                        <div><strong>{{ $option2 }}</strong> responden</div>
                    </li>
                </ul>
            </div>

            <br>
            <div class="container">
                <div class="container">
                    <a class="btn btn-warning m-2 " style="float: left" href="{{ route('dashboard') }}">↩ Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Show Survey | COBLOS</title>
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
    <div class="container mt-5 col-md-6">
        <div class="card row justify-content-center">
            <div class="card-header fw-bold fs-3 mb-1">{{ $survei->title }}</div>
            <div class="card-body fs-6 mb-2">{{ $deskripsi }}</div>
            <hr>

            @foreach ($survei->questions as $key => $question)
                <div class="card-header fw-bold fs-4 mb-2"><span>{{ $key + 1 }}. </span>{{ $question->question }}
                </div>
                <div class="card-body mt-3">
                    <ul class="list-group">
                        @foreach ($question->answers as $answer)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>{{ $answer->answer }}</div>
                                <div>
                                    {{ intval(($answer->responses->count() * 100) / ($question->responses->count() + 1)) }}%
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <br>
            <div class="container">
                <div class="container">
                    <a class="btn btn-success m-2" href="/survey/{{ $survei->id }}/questions" style="float: right">➕
                        Tambah</a>
                    <p class="fs-5 fw-bold m-2" style="float: right">Tambah Pertanyaan ⏩</p>
                </div>
                <a class="btn btn-warning m-3 mt-4" style="float: left" href="{{ route('dashboard') }}">↩ Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Create Vote | COBLOS</title>
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

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header fw-bold fs-4">Buat Voting Baru</div>
            <div class="card-body">
                <br>
                <form action="{{ route('create.vote') }}" autocomplete="on" method="post">
                    @csrf
                    @if (session('errors'))
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

                    <table class="table">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Judul : </label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Masukkan nama voting" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Pertanyaan : </label>
                            <div class="col-sm-10">
                                <input type="text" name="question" id="question" class="form-control"
                                    placeholder="Masukkan pertanyaan" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Pilihan 1 : </label>
                            <div class="col-sm-10">
                                <input type="text" name="option1" id="option1" class="form-control"
                                    placeholder="Masukkan pilihan jawaban pertama" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Pilihan 2 : </label>
                            <div class="col-sm-10">
                                <input type="text" name="option2" id="option2" class="form-control"
                                    placeholder="Masukkan pilihan jawaban kedua" required /><br>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-1" style="float: right">Buat</button>
                        <a class="btn btn-secondary ms-2 m-1" style="float: left"
                            href="{{ route('dashboard') }}">Kembali</a>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

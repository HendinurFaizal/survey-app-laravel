<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Create Question | COBLOS</title>
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
    <div class="container mt-5">
        <div class="card">
            <div class="card-header fw-bold fs-4">Buat Pertanyaan Baru</div>
            <div class="card-body">
                <br>
                <form action="/survey/{{ $id->id }}/questions" autocomplete="on" method="post">
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
                            <label for="question" class="col-sm-2 fs-5 col-form-label">Pertanyaan : </label>
                            <div class="col-sm-10">
                                <input type="text" name="question[question]" id="question" class="form-control"
                                    placeholder="Masukkan pertanyaan" required
                                    value="{{ old('question.question') }}" /><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Pilihan</legend>
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">Jawaban 1</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer1"
                                            placeholder="Masukkan Pilihan 1" value="{{ old('answers.0.answer') }}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer2">Jawaban 2</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer2"
                                            placeholder="Masukkan Pilihan 2" value="{{ old('answers.1.answer') }}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer3">Jawaban 3</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer3"
                                            placeholder="Masukkan Pilihan 3" value="{{ old('answers.2.answer') }}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer4">Jawaban 4</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer4"
                                            placeholder="Masukkan Pilihan 4" value="{{ old('answers.3.answer') }}" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary m-1" style="float: right">Tambah</button>
                            <a class="btn btn-secondary ms-2 m-1" style="float: left"
                            href="{{ route('dashboard') }}">Kembali</a>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

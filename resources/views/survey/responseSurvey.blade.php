<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Response Survey | COBLOS</title>
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

<body style="background-color: azure">
    <br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="background-color: rgb(229, 243, 241)">
                    <h2 class="text-normal fw-bold m-3">{{ $id->title }}</h2>
                    <form action="{{ route('response.survey', $id->id) }}" , method="POST"
                        class="navbar-search navbar-search-light form-inline mr-sm-3">
                        @csrf
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="card-header" style="background-color: rgb(193, 253, 253)">{{ $id->description }}
                        </div>
                        <div class="card-body" style="background-color: rgb(193, 253, 253)">
                            <label for="email">Email</label>
                            <input type="email" name="survey[email]" class="form-control" id="email"
                                placeholder="Email Address" value="{{ old('email') }}">
                        </div>
                        <br>

                        @foreach ($id->questions as $key => $question)
                            <div class="card-header fw-bold fs-4 mb-2"><strong>{{ $key + 1 }}</strong>
                                {{ $question->question }}</div>
                            <div class="card-body mt-3">
                                <ul class="list-group">
                                    @foreach ($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input class="mr-2" type="radio"
                                                    name="responses[{{ $key }}][survey_answer_id]"
                                                    {{ old('responses.' . $key . '.survey_answer_id') == $answer->id ? 'checked' : '' }}
                                                    id="answer{{ $answer->id }}" value="{{ $answer->id }}">
                                                {{ $answer->answer }}

                                                <input type="hidden"
                                                    name="responses[{{ $key }}][survey_question_id]"
                                                    value="{{ $question->id }}">
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                </div>
                <button type="submit" class="btn btn-success m-3" style="float: right">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

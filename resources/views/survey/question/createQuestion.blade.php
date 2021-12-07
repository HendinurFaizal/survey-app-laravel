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

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../../vendor/sb-survey/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="../../vendor/sb-survey/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <span class="contact100-form-title">
                Buat Pertanyaan Baru
            </span>
            <div class="wrap-input100 validate-input">
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
                            <label for="question" class="label-input100">Pertanyaan : </label>
                            <div class="col-sm-10">
                                <input type="text" name="question[question]" id="question" class="input100"
                                    placeholder="Masukkan pertanyaan" required
                                    value="{{ old('question.question') }}" /><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Pilihan</legend>
                                <div>
                                    <div class="wrap-input100 validate-input">
                                        <label for="answer1">Jawaban 1</label>
                                        <input name="answers[][answer]" type="text" class="input100" id="answer1"
                                            placeholder="Masukkan Pilihan 1" value="{{ old('answers.0.answer') }}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="wrap-input100 validate-input">
                                        <label for="answer2">Jawaban 2</label>
                                        <input name="answers[][answer]" type="text" class="input100" id="answer2"
                                            placeholder="Masukkan Pilihan 2" value="{{ old('answers.1.answer') }}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="wrap-input100 validate-input">
                                        <label for="answer3">Jawaban 3</label>
                                        <input name="answers[][answer]" type="text" class="input100" id="answer3"
                                            placeholder="Masukkan Pilihan 3" value="{{ old('answers.2.answer') }}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="wrap-input100 validate-input">
                                        <label for="answer4">Jawaban 4</label>
                                        <input name="answers[][answer]" type="text" class="input100" id="answer4"
                                            placeholder="Masukkan Pilihan 4" value="{{ old('answers.3.answer') }}" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="container-contact100-form-btn">
                            <div class="wrap-contact100-form-btn">
                                <div class="contact100-form-bgbtn"></div>
                                <button type="submit" class="contact100-form-btn">
                                    <a>
                                        Tambah<a>
                                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="container-contact100-form-btn">
                            <div class="wrap-contact100-form-btn">
                                <div class="contact100-form-bgbtn"></div>
                                <button class="contact100-form-btn">

                                    <a href="{{ route('dashboard') }}">
                                        Kembali
                                        <i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>
                                    </a>

                                </button>
                            </div>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
<!--===============================================================================================-->
<script src="../../vendor/sb-survey/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../../vendor/sb-survey/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../../vendor/sb-survey/vendor/bootstrap/js/popper.js"></script>
<script src="../../vendor/sb-survey/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../../vendor/sb-survey/vendor/select2/select2.min.js"></script>
<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script src="../../vendor/sb-survey/vendor/daterangepicker/moment.min.js"></script>
<script src="../../vendor/sb-survey/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../../vendor/sb-survey/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../../vendor/sb-survey/js/main.js"></script>

</html>

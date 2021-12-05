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

    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../vendor/sb-survey/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../../vendor/sb-survey/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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
                {{ $survei->title }}
            </span>
            <span class="contact100-form-subtitle">
                {{ $survei->description }}
            </span>
            <form action="{{ route('response.survey', $survei->id) }}" , method="POST"
                class="contact100-form validate-form">
                @csrf
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="wrap-input100">
                    <label for="email" style="font-weight: bold">Email</label>
                    <input type="email" name="survey[email]" class="input100" id="email"
                        placeholder="Email Address" value="{{ old('email') }}">
                </div>
                <br><br>

                @foreach ($survei->questions as $key => $question)
                <div class="wrap-input100 validate-input">
					<span class="label-input100">{{ $key + 1 }}. </span>
					<span class="label-input100">{{ $question->question }}</span>
                </div>
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
                    <br><br>
                @endforeach
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span><a>
                                Tambah<a>
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                </div>
        </div>
                
                </form>
            </div>
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

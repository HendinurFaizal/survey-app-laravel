<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Response Vote | COBLOS</title>
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
                {{ $vote->title }}
            </span>
            <form action="{{ route('response.vote', $vote->id) }}" , method="POST"
                class="contact100-form">
                @csrf
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="wrap-input100">
                    <label for="email" style="font-weight: bold">Email</label>
                    <input type="email" name="email" class="input100" id="email"
                        placeholder="Email Address" value="{{ old('email') }}">
                </div>
                <br><br>
                <div class="card-header">{{ $vote->question }}
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($options as $option)
                            <label for="{{ $option->id }}">
                                <li class="list-group-item">
                                    <input type="radio" name="option" id="{{ $option->id }}"
                                        value={{ $option->option }}>
                                    {{ $option->option }}
                                </li>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span><a>
                                Kirim<a>
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
                
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

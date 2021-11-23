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
            <h5 class="text-secondary fw-bold">Dashboard</h5>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mb-2">Dashboard</a>
            <h5 class="text-secondary fw-bold">Bikin Survey!</h5>
            <a href="{{ route('view.create.survey') }}" class="btn btn-primary mb-2">Buat Survey</a>
            <h5 class="text-secondary fw-bold">Bikin Voting!</h5>
            <a href="{{ route('view.create.vote') }}" class="btn btn-primary mb-2">Buat Voting</a>
            <form method="POST" autocomplete="on" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link fs-5 fw-bold btn btn-sm btn-danger"><span
                        class="text-light ">Keluar</span></button>
            </form>

            <div class="card-header fw-bold fs-2 mt-5">
                <h5 class="text-danger fw-bold mt-3">List Survey</h5>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <tr>
                        <th>🔢 ID</th>
                        <th>📗 Judul</th>
                        <th>🚩 Pertanyaan</th>
                    </tr>
                    @if ($votes->isNotEmpty())
                        @foreach ($votes as $vote)
                            <tr>
                                <td>{{ $vote->id }}</td>
                                <td>{{ $vote->title }}</td>
                                <td>{{ $vote->question }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info my-1" style="color: #F6F5FC"
                                        href="edit-vote/{{ $vote->id }}">🔧Edit</a>
                                    <a class="btn btn-danger btn-sm" style="color: #F6F5FC"
                                        href="delete-vote/{{ $vote->id }}">🗑️Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div>
                            <p class="card-text">Tidak ada voting!</p>
                        </div>
                    @endif
                </table>
            </div>

            <div class="card-header fw-bold fs-2 mt-5">
                <h5 class="text-success fw-bold mt-3">List Voting</h5>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <tr>
                        <th>🔢 ID</th>
                        <th>📗 Judul</th>
                        <th>❓ Pertanyaan</th>
                        <th>⭐ Link</th>
                    </tr>
                    @if ($votes->isNotEmpty())
                        @foreach ($votes as $vote)
                            <tr>
                                <td>{{ $vote->id }}</td>
                                <td>{{ $vote->title }}</td>
                                <td>{{ $vote->question }}</td>
                                <td><a href="{{ $vote->publicPath() }}">{{ $vote->publicPath() }}</a></td>
                                <td>
                                    <a class="btn btn-sm btn-info my-1" style="color: #F6F5FC" href="#">🔧Edit</a>
                                    <a class="btn btn-danger btn-sm" style="color: #F6F5FC" href="#">🗑️Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div>
                            <p class="card-text">Tidak ada voting!</p>
                        </div>
                    @endif
                </table>
            </div>
        </div>
    </div>
</body>

</html>

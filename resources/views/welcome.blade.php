<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Perpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg mt-5 fixed-top ">
            <div class="container">
                <a href="{{ url('/') }}" class=" text-decoration-none text-dark">
                    <img src="{{ asset('red opened book.png') }}" alt="" height="50px" width="70px">
                    E-Perpus</a>
                <div class="collapse navbar-collapse  d-flex justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" id="home" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="about1" href="#about">About</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-dark  rounded-pill">Login -></a>
                </div>
            </div>
        </nav>

        <div class="container d-flex justify-content-center align-items-center " style="height:700px; ">
            <div class=" d-block ">
                <h1 class="fw-bold">Perbanyaklah Membaca</h1>
                <div class="d-flex justify-content-center">
                    <h3 class=" fw-semibold ">Dengan Mengggunakan E-Perpus</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ url('login') }}" class="btn btn-dark  rounded-pill">Mulai !</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container d-flex justify-content-center align-items-center mt-5" style="height:700px;">
            <div class="row">
                <div class="col">
                    <div class=" d-block ">
                        <h1 class="fw-bold" id="about">About</h1>
                        <div class="d-flex justify-content-center">
                            <h3 class=" fw-normal  mt-3">
                                E-Perpus di dirikan pada tanggal 19 Februari 2024 dan E-Perpus ini
                                di buat untuk mempermudah para pembaca buku. E-Perpus selain mempermudah, E-Perpus juga
                                di buat karena salah satunya untuk mengembangkan teknologi di Indonesia.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img src="{{ asset('image 3 (1).png') }}" alt="" height="850px" width="750px">
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

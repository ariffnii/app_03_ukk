<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>L-Books</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('sneat/assets/css/deskripsiBuku.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Kameron&family=Lato&family=Lexend+Deca&family=Lexend+Exa:wght@500&family=Public+Sans:ital@0;1&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">L-Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="">Categories</a>
                    </li>
                </ul>
                <li class="nav-item navbar-dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('sneat/assets/img/icons/user-w.png') }}" alt=""
                            class="rounded-circle" style="width: 50px; height:50px; margin-bottom:20px;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex me-3">
                                        <img src="{{ asset('sneat/assets/img/icons/user.png') }}" alt=""
                                            class="rounded-circle" style="width: 50px; height:50px">
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{ Auth::user()->name }}</span>
                                        <small class="text-muted">{{ Auth::user()->role }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                <box-icon type='solid' class="me-2 align-middle" name='dashboard'></box-icon>
                                <span class="align-middle">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <box-icon name='power-off' class="me-2 align-middle" ></box-icon>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
    <div id="container1">
        <div class="container">
            <div class="row">
                <div class="col-3" style="padding-top: 154px">
                    <div class="cover1">
                        <a href="/dashboard">
                            <img src="{{ asset('storage/cover_book/'. $dbuku->cover) }}" alt="">
                        </a>
                        <p id="judul" class="text-light">{{ $dbuku->judul }}</p>
                    </div>
                </div>
                <div class="col-9" style="padding-top: 108px; padding-left:146px">
                    <div class="card" style="width: 756px; height:713px">
                        <div class="card-body" style="width: 567px; height:713px">
                            <div class="card-title" style="padding-top: 46px; padding-left:44px">
                                <p style="font-family:'Public Sans', sans-serif; font-size:32px; text-align:left">{{ $dbuku->judul }}
                                </p>
                            </div>
                            <div class="card-text">
                                <p
                                    style="text-align:left; padding-top:39px; padding-left:44px; font-family:'Public Sans', sans-serif; font-size:20px">
                                    {{ $dbuku->deskripsi }}
                                </p>
                                <div class="row">
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:30px; padding-left:44px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            Penulis</p>
                                    </div>
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:30px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            {{ $dbuku->penulis }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:10px; padding-left:44px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            Penerbit</p>
                                    </div>
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:10px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            {{ $dbuku->penerbit }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:10px; padding-left:44px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            Tahun Terbit</p>
                                    </div>
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:10px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            {{ $dbuku->tahun_terbit }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:10px; padding-left:44px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            Stock</p>
                                    </div>
                                    <div class="col-6">
                                        <p
                                            style="text-align:left; padding-top:10px; font-family:'Public Sans', sans-serif; font-size:20px">
                                            {{ $dbuku->stock }}</p>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 30px; padding-left:270px">
                                    <div class="col-6">
                                        <button class="btn btn-primary"
                                            style="width: 130px; height:47px; font-family:'Public Sans', sans-serif; font-size:20px">Bookmark</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('user.pinjam', $dbuku->id) }}" class="btn btn-primary"
                                            style="width: 130px; height:47px; font-family:'Public Sans', sans-serif; font-size:20px">Pinjam</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="background-color: #696CFF; height:204px">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <p class="text-light"
                        style="font-size: 48px; margin-top:72px; font-family:'Lexend Exa', sans-serif">L-Books</p>
                </div>
                <div class="col-5">
                    <p class="text-light" style="font-size: 18px; margin-top:152px; font-family:'Lato', sans-serif">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        L-Books All Rights Reserved
                    </p>
                </div>
                <div class="col-3 text-light" style="font-family:'Public Sans', sans-serif">
                    <p style="font-size: 24px; margin-top:37px">Kontak Kami</p>
                    <div class="row" style="margin-top: 5px">
                        <div class="col-4">
                            <p style="font-size: 20px">Email</p>
                        </div>
                        <div class="col-8" style="margin-top:5px">
                            <p style="font-size: 15px">L-Books@gmail.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p style="font-size: 20px; margin-top:5px">Social</p>
                        </div>
                        <div class="col-8" style="color:white; font-size:25px;">
                            <i class="bi bi-facebook" style="margin-right:10px"></i>
                            <i class="bi bi-twitter-x" style="margin-right:10px"></i>
                            <i class="bi bi-instagram"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

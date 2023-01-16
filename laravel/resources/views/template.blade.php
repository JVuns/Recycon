<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @yield('styles')
    <style>
        nav, footer{
            background: darkblue;
        }
        #searchBtn{
            width: 40rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid py-2">
            <ul class="navbar-nav w-100 justify-content-between">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Show Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Manage Item
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                    </ul>
                </li>
                <form class="d-flex" role="search">
                    <input id="searchBtn" class="form-control mx-2" type="search" placeholder="Search product...">
                    <button class="btn btn-outline-light text-white" type="submit">Search</button>
                </form>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/edit-profile">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="/edit-password">Edit Password</a></li>
                    </ul>
                </li>
                @guest
                <li class="nav-item dropdown">
                    <form action="/login">
                        <button class="btn btn-outline-light text-white" type="submit">Login</button>
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <form action="/register">
                        <button class="btn btn-outline-light text-white" type="submit">Register</button>
                    </form>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <form action="/logout">
                        <button class="btn btn-danger text-white" type="submit">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
<footer>
    <div class="container-fluid pt-4 pb-1 text-center text-white">
        <p>© 2022 Copyright Recycon</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>

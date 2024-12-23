<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/trix@2.0.8/dist/trix.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            background-color: #4A56E2;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar .navbar-brand {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        .sidebar ul li {
            margin: 20px 0;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar ul li a:hover {
            background-color: #6A75F0;
            color: #C7D2FE;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .sidebar .dropdown-menu {
            background-color: #4A56E2;
            border: none;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            height: 100vh;
            background-color: #f4f7fc;
        }

        .navbar {
            background-color: rgb(37, 150, 190);
        }

        .navbar-light .navbar-nav .nav-link {
            color: white;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #C7D2FE;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <ul>
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('article.main') }}"><i class="fas fa-newspaper"></i> Article</a></li>
                <li><a href="{{ route('article.create') }}"><i class="fas fa-edit"></i> Create Article</a></li>
                <li><a href="{{ route('user.show') }}"><i class="fas fa-user"></i> User</a></li>
                <li>
                    <a data-bs-toggle="collapse" href="#settingsMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
                        <i class="fas fa-cogs"></i> Pengaturan
                    </a>
                    <div class="collapse" id="settingsMenu">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            

            <main class="full-height">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App Pegawai</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f5f7f7;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        /* Custom Navbar */
        .custom-navbar {
            width: 100%;
            background: #000;
            padding: 14px 0;
            border-radius: 0;
            text-align: center;
            margin-bottom: 30px;
        }

        .custom-navbar a {
            color: #fff;
            margin: 0 25px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
        }

        .custom-navbar a:hover {
            opacity: .8;
        }

        /* Remove rounded corners of container nav */
        .navbar, .container {
            border-radius: 0 !important;
        }
    </style>
</head>

<body>
    <div id="app">

        <!-- ✅ Custom Navbar FIX -->
        <nav class="custom-navbar">
            <a href="{{ route('employees.index') }}">Karyawan</a>
            <a href="{{ route('departments.index') }}">Departemen</a>
            <a href="{{ route('positions.index') }}">Jabatan</a>
            <a href="{{ route('attendance.index') }}">Absensi</a>
            <a href="{{ route('salaries.index') }}">Gaji</a>
        </nav>


        <!-- ✅ Main Content -->
        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Aplikasi Data Pegawai')</title>

    <!-- Tambahkan CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    {{-- ======= NAVBAR ======= --}}
    <header>
        <nav class="navbar">
            <a href="{{ route('employees.index') }}">Karyawan</a>
            <a href="{{ route('departments.index') }}">Departemen</a>
            <a href="{{ route('positions.index') }}">Jabatan</a>
            <a href="{{ route('attendance.index') }}">Absensi</a>
            <a href="{{ route('salaries.index') }}">Gaji</a>
        </nav>
    </header>

    {{-- ======= CONTENT ======= --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- ======= FOOTER ======= --}}
    <footer>
        <p>&copy; {{ date('Y') }} - App Pegawai</p>
    </footer>

</body>
</html>

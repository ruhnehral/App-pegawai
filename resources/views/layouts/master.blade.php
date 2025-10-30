<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Aplikasi Data Pegawai')</title>

    <!-- Tambahkan CSS -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    {{-- ======= NAVBAR ======= --}}
    <header>
        <div class="navbar">
            <a href="{{ route('employees.index') }}">Karyawan</a>
            <a href="{{ route('departments.index') }}">Departemen</a>
            <a href="{{ route('positions.index') }}">Jabatan</a>
            <a href="{{ route('attendance.index') }}">Absensi</a>
            <a href="{{ route('salaries.index') }}">Gaji</a>
        </div>
    </header>

    {{-- ======= CONTENT ======= --}}
    @yield('content')

    {{-- ======= FOOTER ======= --}}


</body>
</html>

@extends('layouts.master')
@section('title','Data Absensi')
@section('content')
<h2>Data Absensi</h2>

<a href="{{ route('attendance.create') }}">+ Tambah Absensi</a>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Karyawan</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
@foreach($attendances as $a)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $a->employee->nama_lengkap }}</td>
    <td>{{ $a->tanggal }}</td>
    <td>{{ $a->status_absensi }}</td>
    <td>
        <a href="{{ route('attendance.edit',$a->id) }}">Edit</a>
        <form action="{{ route('attendance.destroy',$a->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Hapus data?')">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection

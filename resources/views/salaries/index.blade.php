@extends('layouts.master')
@section('title','Data Gaji')
@section('content')
<h2>Data Gaji</h2>

<a href="{{ route('salaries.create') }}">+ Input Gaji</a>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Karyawan</th>
    <th>Bulan</th>
    <th>Total Gaji</th>
    <th>Aksi</th>
</tr>
@foreach($salaries as $s)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $s->employee->nama_lengkap }}</td>
    <td>{{ $s->bulan }}</td>
    <td>{{ $s->total_gaji }}</td>
    <td>
        <a href="{{ route('salaries.edit',$s->id) }}">Edit</a>
        <form action="{{ route('salaries.destroy',$s->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Hapus data?')">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection

@extends('layouts.master')
@section('title','Data Departemen')
@section('content')
<h2>Data Departemen</h2>

<a href="{{ route('departments.create') }}">+ Tambah Departemen</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Departemen</th>
        <th>Aksi</th>
    </tr>
@foreach ($departments as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->nama_departemen }}</td>
        <td>
            <a href="{{ route('departments.edit', $d->id) }}">Edit</a>
            <form action="{{ route('departments.destroy', $d->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach
</table>
@endsection

@extends('layouts.master')
@section('title','Tambah Departemen')

@section('content')
<div class="container">
    <h2>Tambah Departemen</h2>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" required>
        
        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
        </div>

    </form>
</div>
@endsection

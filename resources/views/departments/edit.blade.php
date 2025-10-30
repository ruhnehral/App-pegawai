@extends('layouts.master')
@section('title','Edit Departemen')

@section('content')
<div class="container">
    <h2>Edit Departemen</h2>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf @method('PUT')

        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" value="{{ $department->nama_departemen }}" required>

        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
        </div>

    </form>
</div>
@endsection

@extends('layouts.master')
@section('title','Data Departemen')

@section('content')
<div class="container">
    <div class="page-header">
        <h2>Data Departemen</h2>
            <a href="{{ route('departments.create') }}" class="add-btn">
        <i class="fa fa-plus"></i> Tambah Departemen
    </a>

    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->nama_departemen }}</td>
                <td class="table-action">
                    <a href="{{ route('departments.edit', $department->id) }}" class="action-btn action-edit" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn action-delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align:center;">Belum ada data departemen.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
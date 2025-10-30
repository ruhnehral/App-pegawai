@extends('layouts.master')
@section('title','Data Karyawan')

@section('content')
<div class="container">
    <h2>Data Karyawan</h2>

    <a href="{{ route('employees.create') }}" class="add-btn">
        <i class="fa fa-plus"></i> Tambah Karyawan
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Tanggal Masuk</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $index => $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->nama_lengkap }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->no_telepon ?? '-' }}</td>
                <td>{{ $e->tanggal_lahir ? date('d-m-Y', strtotime($e->tanggal_lahir)) : '-' }}</td>
                <td>{{ $e->alamat ?? '-' }}</td>
                <td>{{ $e->tanggal_masuk ? date('d-m-Y', strtotime($e->tanggal_masuk)) : '-' }}</td>
                <td>{{ $e->department->nama_departemen ?? '-' }}</td>
                <td>{{ $e->position->nama_jabatan ?? '-' }}</td>
                <td>
                    @if($e->status == 'aktif')
                        <span style="color:green; font-weight:600;">Aktif</span>
                    @else
                        <span style="color:red; font-weight:600;">Tidak Aktif</span>
                    @endif
                </td>
                <td class="table-action">
                    <a href="{{ route('employees.edit', $e->id) }}" class="action-btn action-edit" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>

                    <form action="{{ route('employees.destroy',$e->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="action-btn action-delete" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11">Belum ada data karyawan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

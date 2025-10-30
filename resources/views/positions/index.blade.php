@extends('layouts.master')
@section('title','Data Jabatan')

@section('content')
<div class="container">
    <h2>Data Jabatan</h2>

    <a href="{{ route('positions.create') }}" class="add-btn">
        <i class="fa fa-plus"></i> Tambah Jabatan
    </a>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($positions as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama_jabatan }}</td>
                    <td>Rp {{ number_format($p->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="table-action">
                        <a href="{{ route('positions.edit', $p->id) }}" class="action-btn action-edit" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('positions.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="action-btn action-delete" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada data jabatan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok'   => 'required|numeric',
        ]);

        Position::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok'   => $request->gaji_pokok,
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok'   => 'required|numeric',
        ]);

        $position = Position::findOrFail($id);
        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok'   => $request->gaji_pokok,
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Position::destroy($id);
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}

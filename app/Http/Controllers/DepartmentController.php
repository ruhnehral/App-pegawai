<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required'
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required'
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diupdate');
    }

    public function destroy(string $id)
    {
        Department::destroy($id);
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus');
    }
}

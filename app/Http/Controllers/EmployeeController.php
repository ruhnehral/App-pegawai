<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'position'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'tanggal_masuk' => 'required|date'
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function show($id)
    {
        $employee = Employee::with(['department','position'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();

        return view('employees.edit', compact('employee','departments','positions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'tanggal_masuk' => 'required|date'
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}

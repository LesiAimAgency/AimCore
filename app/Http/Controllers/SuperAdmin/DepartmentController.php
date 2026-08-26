<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('manager')->latest()->paginate(10);

        return view('superadmin.departments.index', compact('departments'));
    }

    public function create()
    {
        $managers = User::where('status', true)->get();

        return view('superadmin.departments.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:departments,code',
            'description' => 'nullable|string',
            'manager_id' => 'nullable|exists:users,id',
            'status' => 'required|in:active,inactive',
        ]);

        Department::create($validated);

        return redirect()->route('superadmin.departments.index')->with('success', 'Department created successfully.');
    }

    public function show(Department $department)
    {
        return view('superadmin.departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        $managers = User::where('status', true)->get();

        return view('superadmin.departments.edit', compact('department', 'managers'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:departments,code,'.$department->id,
            'description' => 'nullable|string',
            'manager_id' => 'nullable|exists:users,id',
            'status' => 'required|in:active,inactive',
        ]);

        $department->update($validated);

        return redirect()->route('superadmin.departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('superadmin.departments.index')->with('success', 'Department deleted successfully.');
    }
}

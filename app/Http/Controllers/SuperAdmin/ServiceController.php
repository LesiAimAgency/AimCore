<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Department;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('department')->latest()->paginate(10);
        return view('superadmin.services.index', compact('services'));
    }

    public function create()
    {
        $departments = Department::where('status', 'active')->get();
        return view('superadmin.services.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:services,code',
            'description' => 'nullable|string',
            'form_schema' => 'nullable|json',
            'status' => 'required|in:active,inactive',
        ]);

        if (isset($validated['form_schema']) && is_string($validated['form_schema'])) {
            $validated['form_schema'] = json_decode($validated['form_schema'], true);
        }

        Service::create($validated);

        return redirect()->route('superadmin.services.index')->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('superadmin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $departments = Department::where('status', 'active')->get();
        return view('superadmin.services.edit', compact('service', 'departments'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:services,code,' . $service->id,
            'description' => 'nullable|string',
            'form_schema' => 'nullable|json',
            'status' => 'required|in:active,inactive',
        ]);

        if (isset($validated['form_schema']) && is_string($validated['form_schema'])) {
            $validated['form_schema'] = json_decode($validated['form_schema'], true);
        }

        $service->update($validated);

        return redirect()->route('superadmin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('superadmin.services.index')->with('success', 'Service deleted successfully.');
    }
}

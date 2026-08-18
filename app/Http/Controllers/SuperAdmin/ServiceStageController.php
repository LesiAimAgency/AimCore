<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ServiceStage;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceStageController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceStage::with('service')->orderBy('service_id')->orderBy('order');
        if ($request->has('service_id')) {
            $query->where('service_id', $request->service_id);
        }
        $stages = $query->paginate(20);
        $services = Service::where('status', 'active')->get();
        return view('superadmin.service_stages.index', compact('stages', 'services'));
    }

    public function create(Request $request)
    {
        $services = Service::where('status', 'active')->get();
        $selectedService = $request->service_id ?? null;
        return view('superadmin.service_stages.create', compact('services', 'selectedService'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        ServiceStage::create($validated);

        return redirect()->route('superadmin.service-stages.index', ['service_id' => $validated['service_id']])
            ->with('success', 'Service stage created successfully.');
    }

    public function show(ServiceStage $serviceStage)
    {
        return view('superadmin.service_stages.show', compact('serviceStage'));
    }

    public function edit(ServiceStage $serviceStage)
    {
        $services = Service::where('status', 'active')->get();
        return view('superadmin.service_stages.edit', compact('serviceStage', 'services'));
    }

    public function update(Request $request, ServiceStage $serviceStage)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $serviceStage->update($validated);

        return redirect()->route('superadmin.service-stages.index', ['service_id' => $validated['service_id']])
            ->with('success', 'Service stage updated successfully.');
    }

    public function destroy(ServiceStage $serviceStage)
    {
        $serviceId = $serviceStage->service_id;
        $serviceStage->delete();
        return redirect()->route('superadmin.service-stages.index', ['service_id' => $serviceId])
            ->with('success', 'Service stage deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('tax_code', 'like', "%{$search}%");
        }

        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('superadmin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('superadmin.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:individual,company',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'tax_code' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'id_card_details' => 'nullable|string|max:255',
            'representative_name' => 'nullable|string|max:255',
            'representative_phone' => 'nullable|string|max:50',
            'representative_title' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);

        Customer::create($validated);

        return redirect()->route('superadmin.customers.index')
            ->with('success', 'Thêm khách hàng thành công');
    }

    public function edit(Customer $customer)
    {
        return view('superadmin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'type' => 'required|in:individual,company',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'tax_code' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'id_card_details' => 'nullable|string|max:255',
            'representative_name' => 'nullable|string|max:255',
            'representative_phone' => 'nullable|string|max:50',
            'representative_title' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);

        $customer->update($validated);

        return redirect()->route('superadmin.customers.index')
            ->with('success', 'Cập nhật khách hàng thành công');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('superadmin.customers.index')
            ->with('success', 'Xóa khách hàng thành công');
    }
}

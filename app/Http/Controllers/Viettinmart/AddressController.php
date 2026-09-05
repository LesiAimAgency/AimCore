<?php

namespace App\Http\Controllers\Viettinmart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'receiver_name' => 'required|string|max:100',
            'receiver_phone' => 'required|string|max:20',
            'province_code' => 'required',
            'ward_code' => 'required',
            'province_name' => 'required',
            'district_name' => 'required',
            'ward_name' => 'required',
            'address_detail' => 'required',
            'full_address' => 'nullable|string',
        ]);

        $user = Auth::user();

        // Construct full_address if missing - SANITIZED
        $fullAddress = $request->full_address;
        if (empty($fullAddress)) {
            $fullAddress = implode(', ', array_filter([
                sanitize_user_input($request->address_detail),
                sanitize_user_input($request->ward_name),
                sanitize_user_input($request->district_name),
                sanitize_user_input($request->province_name),
            ]));
        } else {
            $fullAddress = sanitize_user_input($fullAddress);
        }

        // If this is the first address, make it default
        $isDefault = $user->addresses()->count() === 0 || $request->has('is_default');

        if ($isDefault) {
            $user->addresses()->update(['is_default' => false]);
        }

        $user->addresses()->create([
            'receiver_name' => sanitize_user_input($request->receiver_name),
            'receiver_phone' => sanitize_user_input($request->receiver_phone),
            'province_code' => sanitize_user_input($request->province_code),
            'ward_code' => sanitize_user_input($request->ward_code),
            'province_name' => sanitize_user_input($request->province_name),
            'district_name' => sanitize_user_input($request->district_name),
            'ward_name' => sanitize_user_input($request->ward_name),
            'address_detail' => sanitize_user_input($request->address_detail),
            'full_address' => $fullAddress,
            'is_default' => $isDefault,
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Đã thêm địa chỉ mới thành công.']);
        }

        return back()->with('success', 'Đã thêm địa chỉ mới thành công.');
    }

    public function setDefault($id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        $user->addresses()->update(['is_default' => false]);
        $address->update(['is_default' => true]);

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Đã đặt địa chỉ mặc định.']);
        }

        return back()->with('success', 'Đã đặt địa chỉ mặc định.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'receiver_name' => 'required|string|max:100',
            'receiver_phone' => 'required|string|max:20',
            'address_detail' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        $address->update([
            'receiver_name' => sanitize_user_input($request->receiver_name),
            'receiver_phone' => sanitize_user_input($request->receiver_phone),
            'address_detail' => sanitize_user_input($request->address_detail),
            'full_address' => sanitize_user_input($request->address_detail), // Simple update for now
        ]);

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Cập nhật địa chỉ thành công.']);
        }

        return back()->with('success', 'Cập nhật địa chỉ thành công.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        if ($address->is_default && $user->addresses()->count() > 1) {
            $address->delete();
            // Set another one as default
            $user->addresses()->first()->update(['is_default' => true]);
        } else {
            $address->delete();
        }

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Đã xóa địa chỉ.']);
        }

        return back()->with('success', 'Đã xóa địa chỉ.');
    }
}

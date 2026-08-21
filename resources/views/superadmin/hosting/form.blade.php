@extends('superadmin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            {{ isset($profile) ? 'Edit Hosting Profile' : 'Add New Hosting Profile' }}
        </h1>
        <a href="{{ route('superadmin.hosting.index') }}" class="text-blue-600 hover:underline">
            &larr; Back to list
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ isset($profile) ? route('superadmin.hosting.update', $profile) : route('superadmin.hosting.store') }}" method="POST">
            @csrf
            @if(isset($profile))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Info -->
                <div class="col-span-2 border-b pb-4 mb-2">
                    <h2 class="text-lg font-semibold text-gray-700">Basic Info</h2>
                </div>

                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Profile Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $profile->name ?? '') }}" placeholder="e.g. Main Hosting Tinovn" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <!-- Hosting Settings -->
                <div class="col-span-2 border-b pb-4 mb-2 mt-4">
                    <h2 class="text-lg font-semibold text-gray-700">Hosting API Settings</h2>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="panel_type">Panel Type <span class="text-red-500">*</span></label>
                    <select name="panel_type" id="panel_type" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="cpanel" {{ (old('panel_type', $profile->panel_type ?? '') == 'cpanel') ? 'selected' : '' }}>cPanel</option>
                        <option value="directadmin" {{ (old('panel_type', $profile->panel_type ?? '') == 'directadmin') ? 'selected' : '' }}>DirectAdmin</option>
                        <option value="manual" {{ (old('panel_type', $profile->panel_type ?? '') == 'manual') ? 'selected' : '' }}>Manual (No API)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hostname">Hostname <span class="text-red-500">*</span></label>
                    <input type="text" name="hostname" id="hostname" value="{{ old('hostname', $profile->hostname ?? '') }}" placeholder="e.g. srv123.tinovn.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="port">Port <span class="text-red-500">*</span></label>
                    <input type="number" name="port" id="port" value="{{ old('port', $profile->port ?? 2083) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <p class="text-xs text-gray-500 mt-1">cPanel = 2083, DirectAdmin = 2222</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cpanel_username">Panel Username <span class="text-red-500">*</span></label>
                    <input type="text" name="cpanel_username" id="cpanel_username" value="{{ old('cpanel_username', $profile->cpanel_username ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="api_token">API Token <span class="text-red-500">*</span></label>
                    <input type="password" name="api_token" id="api_token" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" {{ isset($profile) ? '' : 'required' }}>
                    @if(isset($profile))
                        <p class="text-xs text-gray-500 mt-1">Leave blank to keep existing token.</p>
                    @endif
                </div>

                <!-- Deployment Target -->
                <div class="col-span-2 border-b pb-4 mb-2 mt-4">
                    <h2 class="text-lg font-semibold text-gray-700">Deployment Target</h2>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="public_html_path">Public Path</label>
                    <input type="text" name="public_html_path" id="public_html_path" value="{{ old('public_html_path', $profile->public_html_path ?? 'public_html') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-xs text-gray-500 mt-1">Relative to home directory, usually 'public_html' or 'public_html/domain.com'</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="db_prefix">Database Prefix</label>
                    <input type="text" name="db_prefix" id="db_prefix" value="{{ old('db_prefix', $profile->db_prefix ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-xs text-gray-500 mt-1">Leave blank to use panel username as prefix.</p>
                </div>

            </div>

            <div class="flex items-center justify-end mt-8">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{ isset($profile) ? 'Update Profile' : 'Save Profile' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

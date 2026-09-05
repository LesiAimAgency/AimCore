@extends('admin.layouts.app')

@section('title', 'Security Settings')
@section('page-title', 'Security Settings')
@section('page-subtitle', 'Configure security and anti-spam features')

@section('page-actions')
    <a href="{{ locale_route('admin.spam.dashboard') }}" class="btn btn-secondary">
        <i class="fa-solid fa-shield-halved"></i> Security Dashboard
    </a>
@endsection

@section('content')
<form action="{{ locale_route('admin.security.update') }}" method="POST" class="max-w-4xl">
    @csrf
    
    <div class="space-y-6">
        
        {{-- Anti-Spam Settings --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Anti-Spam Protection</h3>
            </div>
            <div class="card-body space-y-4">
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">Enable Anti-Spam Protection</label>
                        <p class="text-sm text-gray-500">Master switch for all anti-spam features</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[antispam_enabled]" value="1" 
                               {{ $settingsMap->get('antispam_enabled', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">Enable Honeypot Fields</label>
                        <p class="text-sm text-gray-500">Hidden fields to catch bots</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[honeypot_enabled]" value="1" 
                               {{ $settingsMap->get('honeypot_enabled', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div>
                    <label class="form-label">Security Level</label>
                    <select name="settings[security_level]" class="form-select">
                        <option value="1" {{ $settingsMap->get('security_level', 2) == 1 ? 'selected' : '' }}>
                            Level 1 - Very Lenient (min 0.2s, 200 req/h)
                        </option>
                        <option value="2" {{ $settingsMap->get('security_level', 2) == 2 ? 'selected' : '' }}>
                            Level 2 - Lenient (min 0.5s, 150 req/h) [Default]
                        </option>
                        <option value="3" {{ $settingsMap->get('security_level', 2) == 3 ? 'selected' : '' }}>
                            Level 3 - Moderate (min 1s, 100 req/h)
                        </option>
                        <option value="4" {{ $settingsMap->get('security_level', 2) == 4 ? 'selected' : '' }}>
                            Level 4 - Strict (min 2s, 50 req/h)
                        </option>
                        <option value="5" {{ $settingsMap->get('security_level', 2) == 5 ? 'selected' : '' }}>
                            Level 5 - Very Strict (min 3s, 30 req/h)
                        </option>
                    </select>
                    <p class="form-hint">
                        Controls form submission speed and rate limits. 
                        <strong>Note:</strong> Changing this requires running: <code>php artisan security:level {level}</code>
                    </p>
                </div>
            </div>
        </div>

        {{-- Security Headers --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Security Headers</h3>
            </div>
            <div class="card-body space-y-4">
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">Enable Security Headers</label>
                        <p class="text-sm text-gray-500">X-Frame-Options, X-Content-Type-Options, CSP</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[security_headers_enabled]" value="1" 
                               {{ $settingsMap->get('security_headers_enabled', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="p-4 bg-blue-50 rounded-lg">
                    <h4 class="font-semibold text-blue-800 mb-2">Active Security Headers:</h4>
                    <ul class="text-sm text-blue-700 space-y-1">
                        <li>✓ X-Content-Type-Options: nosniff</li>
                        <li>✓ X-Frame-Options: DENY</li>
                        <li>✓ X-XSS-Protection: 1; mode=block</li>
                        <li>✓ Referrer-Policy: strict-origin-when-cross-origin</li>
                        <li>✓ Content-Security-Policy (production only)</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Threat Detection --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Threat Detection</h3>
            </div>
            <div class="card-body space-y-4">
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">SQL Injection Detection</label>
                        <p class="text-sm text-gray-500">Block SQL injection attempts</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[sql_injection_detection]" value="1" 
                               {{ $settingsMap->get('sql_injection_detection', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">XSS Detection</label>
                        <p class="text-sm text-gray-500">Block cross-site scripting attempts</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[xss_detection]" value="1" 
                               {{ $settingsMap->get('xss_detection', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">Path Traversal Detection</label>
                        <p class="text-sm text-gray-500">Block directory traversal attempts</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[path_traversal_detection]" value="1" 
                               {{ $settingsMap->get('path_traversal_detection', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">Command Injection Detection</label>
                        <p class="text-sm text-gray-500">Block command injection attempts</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[command_injection_detection]" value="1" 
                               {{ $settingsMap->get('command_injection_detection', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Logging --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Security Logging</h3>
            </div>
            <div class="card-body space-y-4">
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">Log Security Threats</label>
                        <p class="text-sm text-gray-500">Log all security events to storage/logs/security.log</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[log_security_threats]" value="1" 
                               {{ $settingsMap->get('log_security_threats', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <label class="form-label mb-1">Log Admin Activity</label>
                        <p class="text-sm text-gray-500">Log admin actions to storage/logs/activity.log</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="settings[log_admin_activity]" value="1" 
                               {{ $settingsMap->get('log_admin_activity', true) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <div>
                    <label class="form-label">Log Retention (days)</label>
                    <input type="number" name="settings[log_retention_days]" class="form-input" 
                           value="{{ $settingsMap->get('log_retention_days', 30) }}" min="1" max="365">
                    <p class="form-hint">Automatically delete logs older than this many days</p>
                </div>
            </div>
        </div>

        {{-- Commands Reference --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Artisan Commands</h3>
            </div>
            <div class="card-body">
                <div class="space-y-3">
                    <div class="p-3 bg-gray-50 rounded-lg font-mono text-sm">
                        <div class="font-semibold mb-1">Set Security Level:</div>
                        <code>php artisan security:level {1-5}</code>
                    </div>
                    
                    <div class="p-3 bg-gray-50 rounded-lg font-mono text-sm">
                        <div class="font-semibold mb-1">Clear Anti-Spam Cache:</div>
                        <code>php artisan antispam:clear --all</code>
                    </div>
                    
                    <div class="p-3 bg-gray-50 rounded-lg font-mono text-sm">
                        <div class="font-semibold mb-1">Clear Cache for Specific IP:</div>
                        <code>php artisan antispam:clear --ip=192.168.1.100</code>
                    </div>
                </div>
            </div>
        </div>

        {{-- Save Button --}}
        <div class="flex justify-end gap-3">
            <a href="{{ locale_route('admin.settings.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-times"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-save"></i> Save Settings
            </button>
        </div>
    </div>
</form>
@endsection

@push('styles')
<style>
.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 24px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #3b82f6;
}

input:checked + .slider:before {
    transform: translateX(26px);
}
</style>
@endpush


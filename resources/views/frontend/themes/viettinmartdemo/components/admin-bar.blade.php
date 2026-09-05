@auth
@if(auth()->user()->is_admin ?? false)
<div id="admin-bar" style="
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    padding: 8px 16px;
    font-size: 13px;
    z-index: 9999;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-bottom: 2px solid #3b82f6;
">
    <div style="display: flex; align-items: center; justify-content: space-between; max-width: 1200px; margin: 0 auto;">
        <!-- Left: Admin Info -->
        <div style="display: flex; align-items: center; gap: 16px;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-shield-halved" style="color: #3b82f6;"></i>
                <span style="font-weight: 600;">Admin Mode</span>
            </div>
            
            <!-- Form Submissions Counter -->
            @php
                $recentSubmissions = \App\Models\FormSubmission::where('created_at', '>=', now()->subDays(7))->count();
                $totalSubmissions = \App\Models\FormSubmission::count();
            @endphp
            <div style="display: flex; align-items: center; gap: 8px; padding: 4px 12px; background: rgba(59, 130, 246, 0.2); border-radius: 20px; border: 1px solid rgba(59, 130, 246, 0.3);">
                <i class="fa-solid fa-envelope" style="color: #60a5fa;"></i>
                <span>{{ $recentSubmissions }} submissions (7 ngày)</span>
                <span style="background: #3b82f6; color: white; padding: 2px 8px; border-radius: 10px; font-size: 11px; font-weight: 600;">
                    {{ $totalSubmissions }} total
                </span>
            </div>

            <!-- Quick Stats -->
            @php
                $activeTemplates = \App\Models\FormTemplate::where('is_active', true)->count();
                $activeModals = \App\Models\ModalForm::where('is_active', true)->count();
            @endphp
            <div style="display: flex; align-items: center; gap: 12px; font-size: 12px; opacity: 0.8;">
                <span><i class="fa-solid fa-wpforms"></i> {{ $activeTemplates }} templates</span>
                <span><i class="fa-solid fa-window-maximize"></i> {{ $activeModals }} modals</span>
            </div>
        </div>

        <!-- Right: Quick Actions -->
        <div style="display: flex; align-items: center; gap: 12px;">
            <!-- Recent Submissions Dropdown -->
            <div style="position: relative;" x-data="{ open: false }">
                <button @click="open = !open" style="
                    display: flex; align-items: center; gap: 6px; 
                    background: rgba(255,255,255,0.1); 
                    border: 1px solid rgba(255,255,255,0.2); 
                    color: white; 
                    padding: 6px 12px; 
                    border-radius: 6px; 
                    font-size: 12px; 
                    cursor: pointer;
                    transition: all 0.2s;
                " onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                    <i class="fa-solid fa-bell"></i>
                    <span>Submissions</span>
                    <i class="fa-solid fa-chevron-down" style="font-size: 10px;" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </button>
                
                <div x-show="open" @click.away="open = false" x-cloak style="
                    position: absolute;
                    top: 100%;
                    right: 0;
                    margin-top: 8px;
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
                    min-width: 350px;
                    max-height: 400px;
                    overflow-y: auto;
                    border: 1px solid #e2e8f0;
                ">
                    <div style="padding: 12px 16px; border-bottom: 1px solid #f1f5f9; background: #f8fafc; border-radius: 8px 8px 0 0;">
                        <h4 style="margin: 0; color: #1e293b; font-size: 14px; font-weight: 600;">Submissions gần đây</h4>
                    </div>
                    
                    @php
                        $latestSubmissions = \App\Models\FormSubmission::with('formTemplate')
                            ->latest('submitted_at')
                            ->take(8)
                            ->get();
                    @endphp
                    
                    @if($latestSubmissions->count() > 0)
                        @foreach($latestSubmissions as $submission)
                        <div style="padding: 12px 16px; border-bottom: 1px solid #f1f5f9; color: #1e293b;">
                            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 4px;">
                                <div style="font-weight: 600; font-size: 13px; color: #3b82f6;">
                                    {{ $submission->formTemplate->name ?? 'Unknown Form' }}
                                </div>
                                <div style="font-size: 11px; color: #64748b;">
                                    {{ $submission->submitted_at->diffForHumans() }}
                                </div>
                            </div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 6px;">
                                @php
                                    $firstField = collect($submission->data)->first();
                                    if (is_array($firstField)) $firstField = implode(', ', $firstField);
                                @endphp
                                {{ Str::limit($firstField, 40) }}
                            </div>
                            <div style="display: flex; gap: 8px;">
                                <span style="background: #dbeafe; color: #1d4ed8; padding: 2px 6px; border-radius: 4px; font-size: 10px; font-weight: 500;">
                                    {{ $submission->source }}
                                </span>
                                <span style="color: #64748b; font-size: 10px;">
                                    IP: {{ $submission->ip_address }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                        
                        <div style="padding: 12px 16px; text-align: center; background: #f8fafc; border-radius: 0 0 8px 8px;">
                            <a href="{{ locale_route('admin.form-templates.index') }}" style="
                                color: #3b82f6; 
                                text-decoration: none; 
                                font-size: 12px; 
                                font-weight: 600;
                            ">
                                Xem tất cả submissions →
                            </a>
                        </div>
                    @else
                        <div style="padding: 20px; text-align: center; color: #64748b;">
                            <i class="fa-solid fa-inbox" style="font-size: 24px; margin-bottom: 8px; opacity: 0.5;"></i>
                            <p style="margin: 0; font-size: 13px;">Chưa có submission nào</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <a href="{{ locale_route('admin.dashboard') }}" style="
                color: rgba(255,255,255,0.8); 
                text-decoration: none; 
                padding: 6px 12px; 
                border-radius: 6px; 
                font-size: 12px;
                transition: all 0.2s;
            " onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
            
            <a href="{{ locale_route('admin.form-templates.index') }}" style="
                color: rgba(255,255,255,0.8); 
                text-decoration: none; 
                padding: 6px 12px; 
                border-radius: 6px; 
                font-size: 12px;
                transition: all 0.2s;
            " onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                <i class="fa-solid fa-wpforms"></i> Forms
            </a>

            <!-- Hide/Show Toggle -->
            <button onclick="toggleAdminBar()" style="
                background: rgba(239, 68, 68, 0.2); 
                border: 1px solid rgba(239, 68, 68, 0.3); 
                color: #f87171; 
                padding: 6px 8px; 
                border-radius: 6px; 
                font-size: 11px; 
                cursor: pointer;
                transition: all 0.2s;
            " onmouseover="this.style.background='#ef4444'; this.style.color='white'" onmouseout="this.style.background='rgba(239, 68, 68, 0.2)'; this.style.color='#f87171'">
                <i class="fa-solid fa-eye-slash"></i>
            </button>
        </div>
    </div>
</div>

<!-- Admin Bar Toggle Button (when hidden) -->
<div id="admin-bar-toggle" style="
    position: fixed;
    top: 10px;
    right: 10px;
    background: #1e293b;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 12px;
    cursor: pointer;
    z-index: 9998;
    display: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
" onclick="toggleAdminBar()">
    <i class="fa-solid fa-shield-halved"></i> Admin
</div>

<script>
function toggleAdminBar() {
    const adminBar = document.getElementById('admin-bar');
    const toggleBtn = document.getElementById('admin-bar-toggle');
    
    if (adminBar.style.display === 'none') {
        adminBar.style.display = 'block';
        toggleBtn.style.display = 'none';
        localStorage.setItem('admin-bar-hidden', 'false');
    } else {
        adminBar.style.display = 'none';
        toggleBtn.style.display = 'block';
        localStorage.setItem('admin-bar-hidden', 'true');
    }
}

// Restore admin bar state
document.addEventListener('DOMContentLoaded', function() {
    const isHidden = localStorage.getItem('admin-bar-hidden') === 'true';
    if (isHidden) {
        document.getElementById('admin-bar').style.display = 'none';
        document.getElementById('admin-bar-toggle').style.display = 'block';
    }
});

// Add top margin to body to prevent content overlap
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('admin-bar').style.display !== 'none') {
        document.body.style.marginTop = '50px';
    }
});
</script>

<!-- Alpine.js for dropdown -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endif
@endauth

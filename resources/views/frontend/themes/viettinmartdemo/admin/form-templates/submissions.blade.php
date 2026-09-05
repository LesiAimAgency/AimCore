@extends('admin.layouts.app')
@section('title', 'Form Submissions')
@section('page-title', 'Submissions: ' . $formTemplate->name)
@section('page-subtitle', 'Danh sách dữ liệu được gửi từ form template')

@section('page-actions')
    @if($submissions->count() > 0)
        <a href="{{ locale_route('admin.form-templates.export', $formTemplate) }}" class="btn btn-primary">
            <i class="fa-solid fa-download"></i> Export CSV
        </a>
    @endif
    <a href="{{ locale_route('admin.form-templates.show', $formTemplate) }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Submissions ({{ $submissions->total() }})</span>
    </div>
    <div class="card-body">
        @if($submissions->count() > 0)
            <div class="tbl-wrap">
                <table style="width:100%;border-collapse:collapse;">
                    <thead class="tbl-head">
                        <tr>
                            <th class="tbl-th">ID</th>
                            <th class="tbl-th">Source</th>
                            @foreach($formTemplate->fields as $field)
                                <th class="tbl-th">{{ $field['label'] }}</th>
                            @endforeach
                            <th class="tbl-th">IP Address</th>
                            <th class="tbl-th">Submitted At</th>
                            <th class="tbl-th">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submissions as $submission)
                        <tr class="tbl-tr">
                            <td class="tbl-td">#{{ $submission->id }}</td>
                            <td class="tbl-td">
                                <span class="badge badge-blue">{{ $submission->source }}</span>
                            </td>
                            @foreach($formTemplate->fields as $field)
                                <td class="tbl-td">
                                    @php
                                        $value = $submission->data[$field['name']] ?? '-';
                                        if (is_array($value)) {
                                            $value = implode(', ', $value);
                                        }
                                    @endphp
                                    {{ Str::limit($value, 30) }}
                                </td>
                            @endforeach
                            <td class="tbl-td">{{ $submission->ip_address ?? '-' }}</td>
                            <td class="tbl-td">{{ $submission->submitted_at->format('d/m/Y H:i') }}</td>
                            <td class="tbl-td">
                                <button class="act-btn view" onclick="viewSubmission({{ $submission->id }})">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <form action="{{ locale_route('admin.form-templates.destroy', $formTemplate) }}" method="POST" 
                                      style="display:inline;" onsubmit="return confirm('Xóa submission này?')">
                                    @csrf @method('DELETE')
                                    <input type="hidden" name="submission_id" value="{{ $submission->id }}">
                                    <button type="submit" class="act-btn del">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $submissions->links() }}
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="fa-solid fa-inbox fa-3x mb-3 opacity-50"></i>
                <p>Chưa có submission nào cho form template này.</p>
                <p class="text-sm">Submissions sẽ xuất hiện ở đây khi có người gửi form.</p>
            </div>
        @endif
    </div>
</div>

<!-- Submission Detail Modal -->
<div id="submissionModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border-radius: 12px; padding: 24px; max-width: 600px; width: 90%; max-height: 80vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;">Chi tiết Submission</h3>
            <button onclick="closeSubmissionModal()" style="background: none; border: none; font-size: 20px; cursor: pointer;">&times;</button>
        </div>
        <div id="submissionContent">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

@push('scripts')
<script>
const submissions = @json($submissions->items());

function viewSubmission(id) {
    const submission = submissions.find(s => s.id === id);
    if (!submission) return;
    
    let html = `
        <div style="margin-bottom: 16px;">
            <strong>ID:</strong> #${submission.id}<br>
            <strong>Source:</strong> ${submission.source}<br>
            <strong>IP Address:</strong> ${submission.ip_address || 'N/A'}<br>
            <strong>Submitted At:</strong> ${new Date(submission.submitted_at).toLocaleString('vi-VN')}
        </div>
        <hr style="margin: 16px 0;">
        <h4>Form Data:</h4>
        <div style="background: #f8fafc; padding: 16px; border-radius: 8px;">
    `;
    
    Object.entries(submission.data).forEach(([key, value]) => {
        if (Array.isArray(value)) {
            value = value.join(', ');
        }
        html += `<div style="margin-bottom: 8px;"><strong>${key}:</strong> ${value}</div>`;
    });
    
    html += '</div>';
    
    document.getElementById('submissionContent').innerHTML = html;
    document.getElementById('submissionModal').style.display = 'block';
}

function closeSubmissionModal() {
    document.getElementById('submissionModal').style.display = 'none';
}

// Close modal when clicking outside
document.getElementById('submissionModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeSubmissionModal();
    }
});
</script>
@endpush
@endsection

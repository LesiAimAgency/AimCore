<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use BelongsToTenant, HasFactory, ProjectScoped;

    protected $fillable = [
        'project_id',
        'tenant_id',
        'form_name',
        'form_template_id',
        'modal_form_id',
        'data',
        'ip_address',
        'user_agent',
        'status',
        'admin_note',
        'source', // 'modal', 'widget', 'page', 'contact'
        'submitted_at',
    ];

    protected $casts = [
        'data' => 'array',
        'submitted_at' => 'datetime',
    ];

    public function getDataAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        return json_decode($value ?? '[]', true) ?: [];
    }

    public function formTemplate()
    {
        return $this->belongsTo(FormTemplate::class);
    }

    public function modalForm()
    {
        return $this->belongsTo(ModalForm::class);
    }
}

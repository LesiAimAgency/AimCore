<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'tenant_id',
        'name',
        'title',
        'description',
        'form_template_id',
        'config',
        'is_active',
        'trigger_type',
        'trigger_delay',
        'trigger_scroll',
        'show_frequency',
    ];

    protected $casts = [
        'config' => 'array',
        'is_active' => 'boolean',
        'trigger_delay' => 'integer',
        'trigger_scroll' => 'integer',
    ];

    public function formTemplate()
    {
        return $this->belongsTo(FormTemplate::class);
    }

    public function submissions()
    {
        return $this->hasMany(FormSubmission::class);
    }

    public function getFieldsAttribute()
    {
        return $this->formTemplate?->fields ?? [];
    }

    public function getStylesAttribute()
    {
        return $this->config['styles'] ?? [];
    }

    public function getContentAttribute()
    {
        return $this->config['content'] ?? [];
    }
}

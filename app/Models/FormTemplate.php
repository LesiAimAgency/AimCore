<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'tenant_id',
        'name',
        'description',
        'fields',
        'is_active',
    ];

    protected $casts = [
        'fields' => 'array',
        'is_active' => 'boolean',
    ];

    public function getFieldsAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        return json_decode($value ?? '[]', true) ?: [];
    }

    public function modalForms()
    {
        return $this->hasMany(ModalForm::class);
    }

    public function submissions()
    {
        return $this->hasMany(FormSubmission::class);
    }
}

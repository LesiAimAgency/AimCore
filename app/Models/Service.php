<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'code',
        'description',
        'form_schema',
        'status',
    ];

    protected $casts = [
        'form_schema' => 'array',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function stages()
    {
        return $this->hasMany(ServiceStage::class)->orderBy('order');
    }
}

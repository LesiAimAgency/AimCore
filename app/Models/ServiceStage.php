<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceStage extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'code',
        'order',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

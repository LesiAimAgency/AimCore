<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assigned_to',
        'project_id',
        'title',
        'description',
        'dev_id',
        'status',
        'priority',
        'gold',
        'gold_awarded',
        'approval_status',
        'acceptance_status',
        'rejection_reason',
        'result_notes',
        'deadline',
        'start_date',
        'position',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
            'start_date' => 'date',
            'completed_at' => 'datetime',
            'gold' => 'integer',
            'gold_awarded' => 'boolean',
        ];
    }

    /** @param Builder $query */
    public function scopePending($query): void
    {
        $query->whereNull('completed_at');
    }

    /** @param Builder $query */
    public function scopeCompleted($query): void
    {
        $query->whereNotNull('completed_at');
    }

    /** @param Builder $query */
    public function scopeForUser($query, int $userId): void
    {
        $query->where(function ($q) use ($userId) {
            $q->where('user_id', $userId)
                ->orWhere('assigned_to', $userId);
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function dev()
    {
        return $this->belongsTo(User::class, 'dev_id');
    }
}

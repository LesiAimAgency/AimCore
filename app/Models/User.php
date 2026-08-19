<?php

// MODIFIED: 2025-01-25 - Added Multi-Tenant Support

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use BelongsToTenant, HasFactory, Notifiable;

    /**
     * Get the database connection for the model.
     */
    public function getConnectionName()
    {
        // If we're in a project context (project database is set), use project connection
        if (config('database.default') === 'project') {
            return 'project';
        }

        return parent::getConnectionName();
    }

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'phone',
        'address',
        'status',
        'role',
        'department',
        'gold',
        'level',
        'project_ids',
        'tenant_id',
        'last_login_at',
        'preferences',
        'employee_code',
        'dob',
        'identity_card',
        'identity_date',
        'identity_place',
        'joining_date',
        'contract_type',
        'base_salary',
        'manager_id',
        'bank_account',
        'bank_name',
        'province_code',
        'district_code',
        'ward_code',
        'street_address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'role' => 'visitor',
        'level' => 2,
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'project_ids' => 'array',
            'preferences' => 'array',
            'last_login_at' => 'datetime',
            'status' => 'boolean',
            'gold' => 'integer',
            'dob' => 'date',
            'identity_date' => 'date',
            'joining_date' => 'date',
            'base_salary' => 'decimal:2',
        ];
    }

    protected static function booted()
    {
        static::deleting(function ($user) {
            if ($user->email === 'admin@example.com') {
                throw new \Exception('Không thể xóa tài khoản Super Admin gốc (admin@example.com).');
            }
        });
    }

    // Relationships
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function briefs()
    {
        return $this->hasMany(Brief::class, 'account_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'dev_id');
    }

    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function subordinates()
    {
        return $this->hasMany(User::class, 'manager_id');
    }

    // Methods
    public function hasRole(string|array $roles): bool
    {
        if (\is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        return $this->roles->whereIn('name', $roles)->isNotEmpty();
    }

    public function hasPermission(string $permission): bool
    {
        // Super admin có tất cả permissions
        if ($this->isSuperAdmin()) {
            return true;
        }

        // Check direct permissions
        if ($this->permissions()->where('name', $permission)->exists()) {
            return true;
        }

        // Check permissions through roles
        foreach ($this->roles as $role) {
            if ($role->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Give permission directly to user.
     */
    public function givePermissionTo(string|Permission $permission): void
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if ($permission && ! $this->permissions->contains($permission)) {
            $this->permissions()->attach($permission);
        }
    }

    /**
     * Revoke permission from user.
     */
    public function revokePermissionTo(string|Permission $permission): void
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if ($permission) {
            $this->permissions()->detach($permission);
        }
    }

    /**
     * Get all permissions for user (direct + through roles).
     */
    public function getAllPermissions()
    {
        $directPermissions = $this->permissions;
        $rolePermissions = $this->roles->flatMap->permissions;

        return $directPermissions->merge($rolePermissions)->unique('id');
    }

    public function assignRole(string $role): void
    {
        $roleModel = Role::where('name', $role)->first();
        if ($roleModel && ! $this->roles->contains($roleModel)) {
            $this->roles()->attach($roleModel);
        }
    }

    // Accessors
    public function getIsAdminAttribute(): bool
    {
        return $this->hasRole(['admin', 'editor', 'support']);
    }

    public function isSuperAdmin(): bool
    {
        return (isset($this->level) && $this->level === 0)
            || $this->role === 'superadmin'
            || $this->role === 'super_admin'
            || $this->hasRole('superadmin')
            || $this->hasRole('super_admin')
            || $this->isManager();
    }

    public function isAdministrator(): bool
    {
        return isset($this->level) && $this->level === 1;
    }

    public function isManager(): bool
    {
        return $this->role === 'manager' || $this->hasRole('manager');
    }

    public function isEmployee(): bool
    {
        return $this->role === 'employee' || $this->hasRole('employee');
    }

    public function isVisitor(): bool
    {
        return $this->role === 'visitor' || $this->hasRole('visitor');
    }

    public function canAccessSuperAdmin(): bool
    {
        return isset($this->level) && \in_array($this->level, [0, 1, 2]);
    }

    public function hasAccessToProject(int $projectId): bool
    {
        return $this->project_ids && \in_array($projectId, $this->project_ids);
    }

    public function assignToProject(int $projectId): void
    {
        $projects = $this->project_ids ?? [];
        if (! \in_array($projectId, $projects)) {
            $projects[] = $projectId;
            $this->update(['project_ids' => $projects]);
        }
    }
}

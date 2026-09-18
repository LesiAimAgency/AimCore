<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'customer_id', 'contract_id', 'name', 'code', 'subdomain', 'remote_url', 'api_token', 'external_domain', 'sync_enabled', 'client_name', 'start_date', 'deadline', 'status', 'total_gold', 'contract_value', 'contract_file', 'technical_requirements', 'features', 'cms_features', 'deployment_config', 'deployment_status', 'environment', 'notes', 'admin_id', 'employee_ids', 'created_by', 'project_admin_username', 'project_admin_password', 'project_admin_password_plain', 'password_updated_at', 'password_updated_by', 'approved_at', 'initialized_at', 'department_id', 'service_id', 'current_stage_id', 'dynamic_form_data', 'project_type', 'is_multi_tenancy'];

    protected $casts = [
        'is_multi_tenancy' => 'boolean',
        'start_date' => 'date',
        'deadline' => 'date',
        'contract_value' => 'decimal:2',
        'total_gold' => 'integer',
        'approved_at' => 'datetime',
        'initialized_at' => 'datetime',
        'password_updated_at' => 'datetime',
        'employee_ids' => 'array',
        'cms_features' => 'array',
        'deployment_config' => 'array',
        'dynamic_form_data' => 'array',
    ];

    protected $hidden = ['project_admin_password', 'project_admin_password_plain'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function currentStage()
    {
        return $this->belongsTo(ProjectStage::class, 'current_stage_id');
    }

    public function stages()
    {
        return $this->hasMany(ProjectStage::class)->orderBy('order');
    }

    public function hostingProfiles()
    {
        return $this->hasMany(HostingProfile::class);
    }

    public function latestDeployment()
    {
        return $this->hasOne(DeploymentHistory::class)->latestOfMany();
    }

    public function allocatedGold(): int
    {
        return (int) $this->tasks()->sum('gold');
    }

    public function remainingGold(): int
    {
        return max(0, (int) ($this->total_gold ?? 1000) - $this->allocatedGold());
    }

    public function isMultiTenancy(): bool
    {
        return (bool) $this->is_multi_tenancy;
    }

    public function scopeMultiTenancy($query)
    {
        return $query->where('is_multi_tenancy', true);
    }

    public function scopeStandard($query)
    {
        return $query->where(function ($q) {
            $q->where('is_multi_tenancy', false)
                ->orWhereNull('is_multi_tenancy');
        });
    }

    public function passwordUpdatedBy()
    {
        return $this->belongsTo(User::class, 'password_updated_by');
    }

    public function passwordAudits()
    {
        return $this->hasMany(ProjectPasswordAudit::class);
    }

    public static function generateSubdomain($employeeCode, $contractCode)
    {
        return strtoupper($employeeCode).'.domain.com/'.$contractCode;
    }

    public static function generateProjectAdminPassword()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';

        return substr(str_shuffle(str_repeat($chars, 12)), 0, 12);
    }

    /**
     * Lấy số thứ tự tiếp theo cho mã dự án chuẩn DA...
     */
    public static function getNextProjectNumber(?int $excludeId = null): int
    {
        $query = static::query();
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        $codes = $query->pluck('code');
        $maxNum = 0;
        foreach ($codes as $code) {
            if (preg_match('/^DA(\d+)/i', $code, $matches)) {
                $num = (int) $matches[1];
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }

        return $maxNum + 1;
    }

    /**
     * Lấy số thứ tự hiện tại của một dự án (nếu đã có mã DA) hoặc số tiếp theo
     */
    public static function getProjectNumberFor(Project $project): int
    {
        if (! empty($project->code) && preg_match('/^DA(\d+)/i', $project->code, $matches)) {
            return (int) $matches[1];
        }

        return static::getNextProjectNumber($project->id);
    }

    /**
     * Sinh mã dự án chuẩn theo quy ước:
     * DA + (001 -> 999, >=1000) + tên công ty / tên khách hàng
     * Ví dụ: DA001-CONG-TY-A, DA001-LE-SI
     */
    public static function generateProjectCode(?string $clientOrCompanyName = null, ?int $projectNumber = null): string
    {
        $num = $projectNumber ?? static::getNextProjectNumber();
        $paddedNum = str_pad((string) $num, 3, '0', STR_PAD_LEFT);

        $cleanName = '';
        if (! empty($clientOrCompanyName)) {
            $cleanName = strtoupper(Str::slug($clientOrCompanyName, '-'));
        }

        return $cleanName ? "DA{$paddedNum}-{$cleanName}" : "DA{$paddedNum}";
    }

    public function getDecryptedPassword(): ?string
    {
        if (empty($this->project_admin_password_plain)) {
            return null;
        }

        try {
            return decrypt($this->project_admin_password_plain);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function getDeploymentId(): string
    {
        return 'DEP-'.str_pad((string) $this->id, 6, '0', STR_PAD_LEFT);
    }

    public function getDomainAttribute(): ?string
    {
        return $this->external_domain ?: ($this->subdomain ?: $this->tenant?->domain);
    }

    public function permissions()
    {
        return $this->hasMany(ProjectPermission::class);
    }

    public function hasPermission($module, $action = 'view')
    {
        $permission = $this->permissions()->where('module', $module)->first();

        if (! $permission) {
            return false;
        }

        return $permission->{'can_'.$action} ?? false;
    }

    public function employees()
    {
        if (! $this->employee_ids) {
            return collect([]);
        }

        return User::whereIn('id', $this->employee_ids)->get();
    }

    public function hasEmployee($employeeId)
    {
        return $this->employee_ids && in_array($employeeId, $this->employee_ids);
    }

    /**
     * Set the encrypted plain password
     */
    public function setEncryptedPassword(string $password): void
    {
        $this->project_admin_password_plain = encrypt($password);
    }

    /**
     * Check if project has a specific CMS feature pack enabled
     */
    public function hasFeature(string $feature): bool
    {
        return is_array($this->cms_features) && in_array($feature, $this->cms_features);
    }

    /**
     * Deployment histories for this project
     */
    public function deploymentHistories(): HasMany
    {
        return $this->hasMany(DeploymentHistory::class);
    }
}

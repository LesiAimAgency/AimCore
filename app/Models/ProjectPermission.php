<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectPermission extends Model
{
    use HasFactory;

    protected $connection = 'project';

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'group',
    ];

    /**
     * Get the roles that have this permission.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(ProjectRole::class, 'role_permissions', 'permission_id', 'role_id');
    }

    /**
     * Get the users that have this permission directly.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(ProjectUser::class, 'user_permissions', 'permission_id', 'user_id');
    }
}

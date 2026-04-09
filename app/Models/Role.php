<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'status',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * Get admins with this role
     */
    public function admins()
    {
        return $this->hasMany(ManageAdmin::class, 'role', 'name');
    }

    /**
     * Check if role has a specific permission
      */
    public function hasPermission($permission)
    {
        if (!$this->permissions) {
            return false;
        }
        
        return in_array($permission, $this->permissions) || 
               (isset($this->permissions[$permission]) && $this->permissions[$permission] === true);
    }

    /**
     * Get active roles only
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get inactive roles only
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }
}
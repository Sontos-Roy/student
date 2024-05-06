<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproverRoles extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }

    public function degrees()
    {
        return $this->belongsToMany(Degree::class, 'degree_approver_roles', 'approver_role_id', 'degree_id');
    }
    /**
     * A role can be associated with many approvals through different admins.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function approvals()
    {
        return $this->hasManyThrough(ClearanceApprover::class, Admin::class);
    }
    public function clearanceApprovers()
    {
        return $this->hasMany(ClearanceApprover::class);
    }
}


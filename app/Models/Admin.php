<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Authenticatable implements AuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guard_name = 'admin';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function clearanceApplications()
    {
        return $this->belongsToMany(Clearance::class, 'clearance_approvers')
            ->withPivot('approved_at', 'approval_note');
    }
    public function approve_role()
    {
        return $this->belongsTo(ApproverRoles::class, 'role_id');
    }
    public function approvals()
    {
        return $this->hasMany(ClearanceApprover::class, 'approver_id');
    }
    public function clearanceApprovers()
    {
        return $this->hasMany(ClearanceApprover::class, 'admin_id');
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function approverRoles()
    {
        return $this->belongsToMany(ApproverRoles::class, 'degree_approver_roles', 'degree_id', 'approver_role_id');
    }
}

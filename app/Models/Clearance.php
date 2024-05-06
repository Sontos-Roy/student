<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }
    // public function approvers()
    // {
    //     return $this->belongsToMany(Admin::class, 'clearance_approvers')
    //         ->withPivot('approved_at', 'approval_note');
    // }
    function degree(){
        return $this->belongsTo(Degree::class);
    }

    function department(){
        return $this->belongsTo(Department::class);
    }

    function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    public function currentApprover() {
        return $this->belongsTo(Admin::class, 'current_approver_id');
    }
    public function clearanceApprovers()
    {
        return $this->hasMany(ClearanceApprover::class);
    }
    function program(){
        return $this->belongsTo(Program::class);
    }
}

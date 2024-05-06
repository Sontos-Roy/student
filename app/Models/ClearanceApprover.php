<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearanceApprover extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clearance()
    {
        return $this->belongsTo(Clearance::class);
    }

    public function approverRole()
    {
        return $this->belongsTo(ApproverRoles::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

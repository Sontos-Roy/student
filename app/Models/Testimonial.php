<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    function dean(){
        return $this->belongsTo(Admin::class, 'dean_id');
    }
    function chairman(){
        return $this->belongsTo(Admin::class, 'chairman_id');
    }
    function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }
    function program(){
        return $this->belongsTo(Program::class, 'program_id');
    }
    function degree(){
        return $this->belongsTo(Degree::class, 'degree_id');
    }
    function supervisor(){
        return $this->belongsTo(Admin::class, 'supervisor_id');
    }

}

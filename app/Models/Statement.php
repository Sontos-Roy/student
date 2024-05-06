<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;
    protected $fillable = ['note', 'pay', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

// use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

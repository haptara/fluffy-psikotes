<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTestProgress extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = ['id'];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function tes()
    {
        return $this->belongsTo(Tests::class, 'test_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

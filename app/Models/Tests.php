<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tests extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function userProgress()
    {
        return $this->hasMany(UserTestProgress::class, 'test_id');
    }
}

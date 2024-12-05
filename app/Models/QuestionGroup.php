<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function test()
    {
        return $this->belongsTo(Tests::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

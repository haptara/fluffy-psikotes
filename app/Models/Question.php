<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = ['id'];

    public function test()
    {
        return $this->belongsTo(Tests::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function questionGroup()
    {
        return $this->belongsTo(QuestionGroup::class);
    }

    public function answersPsikotes()
    {
        return $this->hasMany(Answerpsikotes::class);
    }
}

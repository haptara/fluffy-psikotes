<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answerpsikotes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table    = 'answer_psikotes';
    protected $guarded  = ['id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class, 'selected_choice_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionDisc extends Model
{
    use HasFactory, SoftDeletes;

    protected $table    = 'question_disc';
    protected $guarded  = ['id'];

    /**
     * Relasi ke tabel `question_statements`.
     * Satu soal memiliki banyak pernyataan.
     */
    public function statements()
    {
        return $this->hasMany(QuestionStatementDisc::class);
    }

    /**
     * Relasi ke tabel `user_answers`.
     * Satu soal dapat memiliki banyak jawaban dari user.
     */
    public function userAnswers()
    {
        return $this->hasMany(AnswerDisc::class, 'question_id');
    }
}

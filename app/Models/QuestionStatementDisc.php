<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionStatementDisc extends Model
{
    use HasFactory;

    protected $table    = 'question_statement_disc';
    protected $guarded  = ['id'];

    /**
     * Relasi ke tabel `questions`.
     * Banyak pernyataan dimiliki oleh satu soal.
     */
    public function question()
    {
        return $this->belongsTo(QuestionDisc::class);
    }

    /**
     * Relasi ke tabel `user_answers` untuk kolom `most_selected`.
     */
    public function userAnswersMost()
    {
        return $this->hasMany(AnswerDisc::class, 'most_selected');
    }

    /**
     * Relasi ke tabel `user_answers` untuk kolom `least_selected`.
     */
    public function userAnswersLeast()
    {
        return $this->hasMany(AnswerDisc::class, 'least_selected');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerDisc extends Model
{
    use HasFactory;

    protected $table    = 'answer_disc';
    protected $guarded  = ['id'];

    /**
     * Relasi ke tabel `users`.
     * Satu jawaban dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel `questions`.
     * Satu jawaban terkait dengan satu soal.
     */
    public function question()
    {
        return $this->belongsTo(QuestionDisc::class, 'question_id');
    }

    /**
     * Relasi ke tabel `question_statements` untuk kolom `most_selected`.
     * Pernyataan yang PALING menggambarkan.
     */
    public function mostSelected()
    {
        return $this->belongsTo(QuestionStatementDisc::class, 'most_selected');
    }

    /**
     * Relasi ke tabel `question_statements` untuk kolom `least_selected`.
     * Pernyataan yang PALING TIDAK menggambarkan.
     */
    public function leastSelected()
    {
        return $this->belongsTo(QuestionStatementDisc::class, 'least_selected');
    }
}

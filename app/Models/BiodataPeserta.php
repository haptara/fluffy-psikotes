<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiodataPeserta extends Model
{
    use HasFactory, SoftDeletes;
    protected $table    = 'biodata_peserta';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lokerPosition()
    {
        return $this->belongsTo(Lokerpositions::class, 'position_id')->withDefault();
    }
}

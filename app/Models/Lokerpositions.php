<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokerpositions extends Model
{
    use HasFactory, SoftDeletes;
    protected $table    = 'loker_positions';
    protected $guarded  = ['id'];

    public function biodataPeserta()
    {
        return $this->hasMany(BiodataPeserta::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function biodataPeserta()
    {
        return $this->hasOne(BiodataPeserta::class);
    }

    public function answerPsikotes()
    {
        return $this->hasMany(Answerpsikotes::class);
    }

    public function generatedLink()
    {
        return $this->hasOne(UsersLinks::class);
    }

    public function user_pw_hash()
    {
        return $this->hasOne(UserPwHash::class);
    }

    public function resultPsikotes()
    {
        return $this->hasOne(ResultTests::class);
    }

    public function pelanggarans()
    {
        return $this->belongsTo(UsersPelanggarans::class);
    }
}

<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Chirp;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'username',
        'avatar',
        'like_id',
        'password',
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

    public function chirps()
    {

        return $this->belongsToMany(Chirp::class);

    }

    public function likes()
    {

        return $this->hasMany(Like::class);

    }

    public function rechirps()
    {

        return $this->hasMany(Rechirp::class);

    }

    public function follows()
    {

        return $this->hasMany(Follow::class);

    }

    public function scopeFilter($query, array $filters)
    {

        if ($filters['search'] ?? false)
        {

            return $query->where('username', 'like', '%' . request()->search . '%')
                        ->orWhere('name', 'like', '%' . request()->search . '%');

        }

    }

}

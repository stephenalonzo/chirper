<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chirp extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject'
    ];

    public function users()
    {

        return $this->belongsToMany(User::class);

    }

    public function likes()
    {

        return $this->hasMany(Like::class);

    }

    public function rechirps()
    {

        return $this->hasMany(Rechirp::class);

    }

}

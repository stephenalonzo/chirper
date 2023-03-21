<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'username',
        'subject'
    ];

    public function users()
    {

        $this->belongsToMany(User::class);

    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChirpUser extends Model
{
    use HasFactory;

    public $table = 'chirp_user';
    public $timestamps = false;

    protected $fillable = [
        'chirp_id',
        'user_id'
    ];

}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_1',
        'user_id_1_name',
        'user_id_1_username',
        'user_id_2',
        'user_id_2_name',
        'user_id_2_username'
    ];

    public function users()
    {

        return $this->belongsToMany(User::class);

    }

}

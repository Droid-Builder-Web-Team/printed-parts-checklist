<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'user_profile';

    protected $fillable = [
        'user_id',
        'about',
        'location',
        'avatar'
    ];
}

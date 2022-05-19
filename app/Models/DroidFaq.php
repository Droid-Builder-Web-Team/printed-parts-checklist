<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DroidFaq extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'droid_id',
        'text',
        'content'
    ];
}

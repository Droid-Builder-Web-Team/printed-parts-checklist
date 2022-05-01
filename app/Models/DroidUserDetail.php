<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DroidUserDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'droids_id',
        'image',
        'droid_designation',
        'description',
        'colour_scheme',
        'mobility',
        'electronics',
        'control_system',
        'drive_system',
        'power',
        'gadgets',
        'notes'
    ];
}

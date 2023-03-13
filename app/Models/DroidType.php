<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroidType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'droid_types';

    protected $fillable = [
        'type',
    ];

    public function droid()
    {
        return $this->hasOne(Droid::class);
    }
}

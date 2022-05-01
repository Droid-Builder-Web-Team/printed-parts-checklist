<?php

namespace App\Models;

use App\Models\Droid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instruction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'droids_id',
        'title',
        'url'
    ];

    public function droids()
    {
        return $this->belongsToMany(Droid::class);
    }
}

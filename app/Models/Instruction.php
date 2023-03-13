<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'droid_instructions';

    protected $fillable = [
        'droids_id',
        'title',
        'url'
    ];

    public function droids()
    {
        return $this->hasOne(Droid::class, 'droid_id');
    }
}

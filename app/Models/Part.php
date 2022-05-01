<?php

namespace App\Models;

use App\Models\Droid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Part extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'droids_id',
        'droid_version',
        'droid_section',
        'sub_section',
        'file_path'
    ];

    public function droids()
    {
        return $this->belongTo(Droid::class);
    }
}

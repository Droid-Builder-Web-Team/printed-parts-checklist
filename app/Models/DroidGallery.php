<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DroidGallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'droid_gallery';

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

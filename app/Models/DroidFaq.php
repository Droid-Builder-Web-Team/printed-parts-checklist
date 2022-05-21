<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DroidFaq extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'droid_faq';

    protected $fillable = [
        'droid_id',
        'title',
        'content'
    ];

    public function droid()
    {
        return $this->belongsToMany(Droid::class);
    }
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\Droid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DroidUserPivot extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'droids_id',
        'user_id'
    ];

    public function droids()
    {
        return $this->belongsTo(Droid::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

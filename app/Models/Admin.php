<?php

namespace App\Models;

use App\Models\User;
use App\Models\Droid;
use App\Models\DroidUserPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    public function getUserCount()
    {
        return User::all()->count();
    }

    public function getDroidCount()
    {
        return Droid::all()->count();
    }

    public function getBuildCount()
    {
        return DroidUserPivot::groupBy('user_id')->count();
    }
}

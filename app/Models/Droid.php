<?php

namespace App\Models;

use App\Models\Part;
use App\Models\User;
use App\Models\Instruction;
use App\Models\DroidUserPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Droid extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'version',
        'type',
        'description',
        'tags',
        'image'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function droidUserPivot()
    {
        return $this->hasMany(DroidUserPivot::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }

    /**
     * Get a count of the parts associated with the chosen droid - RH
     */
    public function getCountOfParts()
    {
        return Part::where('droids_id', $this->id)->count();
    }

    public function instructions()
    {
        return $this->hasMany(Instruction::class);
    }

    public function faqs()
    {
        return $this->hasMany(DroidFaq::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Droid extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = 'droids';

    protected $fillable = [
        'name',
        'version',
        'type',
        'description',
        'tags',
        'image',
        'droid_gallery_id',
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

    public function instructions()
    {
        return $this->hasMany(Instruction::class);
    }

    public function faqs()
    {
        return $this->hasMany(DroidFaq::class);
    }

    public function billOfMaterials()
    {
        return $this->hasMany(BillOfMaterial::class);
    }

    public function droidGallery()
    {
        return $this->hasMany(DroidGallery::class);
    }

    public function droidUser()
    {
        return $this->belongsToMany(DroidUserPivot::class);
    }

    public function types()
    {
        return $this->hasOne(DroidType::class);
    }

    /**
     * Get a count of the parts associated with the chosen droid - RH
     */
    public function getCountOfParts()
    {
        return Part::where('droids_id', $this->id)->count();
    }

    /**
     * Get a count of active builds of this droid - RH
     */

    public function getCountOfActiveBuilds()
    {
        // return $activeBuilds = DroidUserPivot::where('completed', 0 && 'droids_id', $this->id)->count();
        $activeBuilds = 25;
        return $activeBuilds;
    }

    /**
     * Get a count of complete builds of this droid - RH
     */
    public function getCountOfCompletedBuilds()
    {
        // return $activeBuilds = DroidUserPivot::where('completed', 1 && 'droids_id', $this->id)->count();
        $completedBuilds = 75;
        return $completedBuilds;
    }

    /**
     * Get a count of completed builds of this droid - RH
     */

    public function getCountOfTotalBuilds()
    {
        // return $completedbuilds = DroidUserPivot::where('droids_id', $this->id)->count();
        $totalBuilds = 100;
        return $totalBuilds;
    }

    /**
     * Get a total Droid User Count
     */
    public function getTotalDroidUserEntriesCount()
    {
        return DroidUserPivot::where('droids_id', $this->id)->count();
    }
}

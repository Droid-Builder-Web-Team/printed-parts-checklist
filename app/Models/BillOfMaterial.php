<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfMaterial extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'droid_bom';

    protected $fillable = [
        'droid_id',
        'title',
        'url'
    ];

    public function droid()
    {
        return $this->hasOne(Droid::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillOfMaterial extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'droid_bom';

    protected $fillable = [
        'droids_id',
        'title',
        'url'
    ];

    public function droid()
    {
        return $this->belongsTo(Droid::class);
    }
}

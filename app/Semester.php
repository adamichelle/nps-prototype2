<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $guarded = [];
    
    public function placement_opportunity()
    {
        $this->hasMany(PlacementOpportunity::class);
    }
}

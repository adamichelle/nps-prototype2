<?php

namespace App;

use App\PlacementOpportunity;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];
    
    public function placement_opportunity()
    {
        $this->hasMany(PlacementOpportunity::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    public function placement_opportunity()
    {
        return $this->belongsTo(PlacementOpportunity::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

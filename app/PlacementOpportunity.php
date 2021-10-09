<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlacementOpportunity extends Model
{
    protected $guarded = [];
    
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function placement()
    {
        $this->hasMany(Placement::class);
    }
}

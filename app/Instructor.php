<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'specialty', 'user_id'];
    
    public function user()
    {
        $this->hasOne(User::class);
    }

    public function placement_opportunity()
    {
        $this->hasMany(PlacementOpportunity::class);
    }
}

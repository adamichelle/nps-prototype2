<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'student_id', 'email', 'school', 'year', 'user_id'];
    
    public function user()
    {
        $this->hasOne(User::class);
    }

    public function placement() {
        $this->hasMany(Placement::class);
    }
}

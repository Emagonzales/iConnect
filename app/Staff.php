<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    public $timestamps = false;
    
    public function group()
    {
        return $this->morphToMany('App\Group', 'group_professor_staff');
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}

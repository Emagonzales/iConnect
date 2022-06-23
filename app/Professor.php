<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{

    public $timestamps = false;
    
    public function gruppo()
    {
        return $this->morphToMany('App\Group', 'group_professor_staff');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

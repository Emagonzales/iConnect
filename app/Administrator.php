<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    

    public function report()
    {
        return $this->hasMany('App\Report');
    }

}

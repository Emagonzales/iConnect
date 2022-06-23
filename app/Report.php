<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $primaryKey='ids';
    public $timestamps=false;

    public function admin()
    {
        return $this->belongsTo('App\Administrator');
    }
    
    public function user()
    {
        return $this->belongsToMany('App\User','report_user');
    }
    
}

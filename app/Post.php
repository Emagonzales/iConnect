<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $primaryKey='idP';
    public $timestamps = false;
    
    public function group()
    {
        return $this->belongsToMany('App\Group','group_post','Post','Gruppo');
    }

    public function user()
    {
        return $this->belongsToMany('App\User','post_user','Post','Utente');
    }


}

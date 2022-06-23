<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    
    protected $primaryKey='CodU';
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsToMany('App\User','group_user','Gruppo','Utente');
    }

    public function post()
    {
        return $this->belongsToMany('App\Post','group_post','Gruppo','Post');
    }

    public function professor()
    {
        return $this->morphedByMany('App\Professor', 'group_professor_staff');
    }

    public function staff()
    {
        return $this->morphedByMany('App\Staff', 'group_professor_staff');
    }

    public function chatg()
    {
        return $this->belongsTo('App\Group_chat');
    }
  
}

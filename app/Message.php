<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $primaryKey='idM';
    public $timestamps=false;

    public function individualchat()
    {
        return $this->belongsTo('App\Individual_chat');
    }

    public function groupchat()
    {
        return $this->belongsTo('App\Group_chat');
    }
}
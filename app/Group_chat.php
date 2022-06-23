<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_chat extends Model
{
    protected $primaryKey='idChatG';

    public function message()
    {
        return $this->hasMany('App\Message', 'ChatG', 'idChatG');
    }
}

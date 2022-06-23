<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual_chat extends Model
{
    protected $primaryKey='idChatI';

    public function message()
    {
        return $this->hasMany('App\Message', 'ChatI', 'idChatI');
    }
}

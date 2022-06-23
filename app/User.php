<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    protected $primaryKey='id'; 
    use Notifiable;

    protected $fillable = [
        'nome','cognome','telefono', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function report()
    {
        return $this->belongsToMany('App\Report','report_user');
    }

    public function notification()
    {
        return $this->belongsToMany('App\Notification','notification_user');
    }

    public function group()
    {
        return $this->belongsToMany('App\Group','group_user','Utente','Gruppo');
    }

    public function post()
    {
        return $this->belongsToMany('App\Post','post_user','Utente','Post');
    }

    public function chatI()
    {
        return $this->belongsTo('App\Individual_chat');
    }

    public function professor()
    {
        return $this->hasOne('App\Professor','Utente','id');
    }

    public function student()
    {
        return $this->hasOne('App\Student','Utente','id');
    }

    public function staff()
    {
        return $this->hasOne('App\Staff','Utente','id');
        
    }

}

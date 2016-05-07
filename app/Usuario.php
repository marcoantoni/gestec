<?php

namespace App;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;
//use Authenticatable, CanResetPassword;

class Usuario extends Authenticatable {


    protected $table = 'usuario';
    public $timestamps = false;

	protected $fillable = ['usuario', 'senha'];
	protected $hidden = ['senha', 'remember_token'];
}

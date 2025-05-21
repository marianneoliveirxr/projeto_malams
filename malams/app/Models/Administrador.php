<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'idPermissao',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}


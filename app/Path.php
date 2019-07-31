<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Path extends Model
{
	 use Notifiable;

      protected $fillable = [
       'ambiente_perg', 'tamanho', 'largura', 'disp',
    ];

}

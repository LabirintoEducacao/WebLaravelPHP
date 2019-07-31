<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reforco extends Model
{
	use Notifiable;
	
    protected $fillable = [
    	'perg_id', 'tipo_perg_ref', 'reforco', 'ambiente_ref', 'tamanho_ref', 'largura_ref', 'disp', 'room_type_ref',
    ];
}

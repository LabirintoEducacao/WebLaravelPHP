<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pergunta extends Model
{
    use Notifiable;
    
    
    protected $fillable = [
        'sala_id', 'tipo_perg', 'pergunta','ambiente_perg', 'tamanho', 'largura', 'prox_perg', 'disp',
    ];



    function sala() {
        return $this->belongsTo("App\Sala");
    }
    
    
}


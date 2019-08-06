<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class path extends Model
{
     protected $fillable = [
       'ambiente_perg', 'tamanho', 'largura', 'disp',
    ];


     public function perguntas() {
        return $this->belongsToMany("App\Pergunta");
    }
}

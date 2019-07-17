<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
   public function pergunta() {
        return $this->hasMany('App\Pergunta');
    }
}

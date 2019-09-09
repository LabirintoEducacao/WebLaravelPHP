<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
    'user_id', 'maze_id', 'question_id', 'answer_id','wrong_count','correct_count', 'correct', 
    'elapsed_time', 'answers_read_count', 'async_timestamp'];
}

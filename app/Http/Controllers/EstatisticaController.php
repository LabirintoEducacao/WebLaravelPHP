<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Data;

class EstatisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return 'ok';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    $resposta = $request->all(['event_name', 'user_id', 'maze_id', 'question_id', 'answer_id', 'wrong_count', 'correct_count', 'correct', 'elapsed_time', 'answers_read_count','async_timestamp']);

             $event = $resposta['event_name'];
             $user_id = $resposta['user_id'];
             $maze_id = $resposta['maze_id'];
             $question_id = $resposta['question_id'];
             $answer_id = $resposta['answer_id'];
             $wrong_count = $resposta['wrong_count'];
             $correct_count = $resposta['correct_count'];
             $correct = $resposta['correct'];
             $elapsed_time = $resposta['elapsed_time'];
             $answers_read_count = $resposta['answers_read_count'];
             $async_timestamp = $resposta['async_timestamp'];


          if($event == "maze_start"){

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'async_timestamp' => $async_timestamp

                    ));

                    return 'maze_start';

             }else if($event == "question_start"){

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp
                              
                    ));
                 return 'question_start';

          }else if($event == "question_read"){

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time

                    ));
                 return 'question_read';

          }else if($event == "answer_read"){

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'answer_id'    => $answer_id 

                    ));
                 return 'answer_read';

          }else if($event == "answer_interaction"){

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'answer_id'    => $answer_id,
                     'correct'   => $correct

                    ));

                 return 'answer_interaction';

          }else if($event == "question_end"){

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'correct'   => $correct,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp

                    ));
                    
                 return 'question_end';

          }else if($event == "maze_end"){

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'elapsed_time' => $elapsed_time,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp

                    ));
                    
                 return 'maze_end';
          }else{

            echo "Erro";
          }
         
             
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

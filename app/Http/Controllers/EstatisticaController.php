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
        $x=0;
        
        if($user_id!=null && $maze_id!=null && $elapsed_time!=null){
        
            $user = DB::table('users')
                    ->where('id', '=', $user_id)
                    ->get();
                    if(count($user)>0){
                        $x++;
                        $sala = DB::table('salas')
                        ->where('id', '=', $maze_id)
                        ->get();
                        if(count($sala)>0){
                            $x++;
                            if($question_id!=null){
                                $perg = DB::table('perguntas')
                                ->where('id', '=', $question_id)
                                ->get();
                                if(count($perg)>0){
                                    $x++;
                                }
                            }
                        }
                    }
            }

          if($event == "maze_start"){
                if($x!=3 || $async_timestamp==null){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'async_timestamp' => $async_timestamp

                    ));

                    return 'maze_start';
                }

             }elseif($event == "question_start"){
                    if($x!=3 || $async_timestamp==null || $wrong_count==null || $correct_count==null){
                    return 'erro';
                }else{
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
                }

          }elseif($event == "question_read"){
                if($x!=3){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time

                    ));
                 return 'question_read';
                }

          }else if($event == "answer_read"){
            if($x!=3 || $answer_id==null){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'answer_id'    => $answer_id 

                    ));
                 return 'answer_read';
            }

          }elseif($event == "answer_interaction"){
              if($x!=3 || $answer_id==null || $correct==null){
                    return 'erro';
                }else{
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
              }

          }elseif($event == "question_end"){
                  if($x!=3 || $async_timestamp==null || $correct==null || $wrong_count==null || $correct_count==null){
                    return 'erro';
                }else{
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
                  }

          }elseif($event == "maze_end"){
              if($x!=2 || $async_timestamp==null || $wrong_count==null || $correct_count==null){
                    return 'erro';
                }else{
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
              }
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

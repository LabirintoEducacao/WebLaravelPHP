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


             $teste = (int)$resposta['async_timestamp'];

             $teste2 = intdiv($teste, 60);

             $resto = $teste%60;

             if($teste2 >= 60){

               $teste3 = intdiv($teste2, 60);

               $resto2 = $teste2%60;

              $resultadot =  ($resto2 * 100) +  $resto + ($teste3 *10000);
             }else{

             $resultadot =  ($teste2 * 100) +  $resto;

            }

             $event = $resposta['event_name'];
             $user_id = (int)$resposta['user_id'];
             $maze_id = (int)$resposta['maze_id'];
             $question_id = (int)$resposta['question_id'];
             $answer_id = (int)$resposta['answer_id'];
             $wrong_count = (int)$resposta['wrong_count'];
             $correct_count =(int) $resposta['correct_count'];
             $correct = $resposta['correct'];
             $elapsed_time = (int)$resposta['elapsed_time'];
             $answers_read_count = (int)$resposta['answers_read_count'];
             $async_timestamp = $resultadot;

              $maze_start = array(

                    'user_id' =>  $user_id,
                    'maze_id' => $maze_id,
                    'question_id' => $question_id,
                    'elapsed_time' =>  $elapsed_time,
                    'async_timestamp' => $async_timestamp

           );


        $x=0;$y=0;
        
        if($user_id!=null || $maze_id!=null || $elapsed_time!=null){
        
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
                            if($question_id!=null && $event != 'maze_end'){
                                $perg = DB::table('perguntas')
                                ->where('id', '=', $question_id)
                                ->get();
                                if(count($perg)>0){
                                    $x++;
                                    if($answer_id!=null && ($event == 'answer_interaction' || $event == 'answer_read')){
                                        $perg_resp = DB::table('perg_resp')
                                                    ->where('perg_id', '=', $question_id)
                                                    ->get();
                                    $resps = DB::table('respostas')
                                    ->where('id', '=', $answer_id)
                                    ->get();
                                    if(count($resps)>0){
                                        foreach($perg_resp as $resp){
                                            if($resp->resp_id == $resps[0]->id){
                                                $x++;
                                            }else{
                                                $y++;
                                            }
                                        }
                                        if($y==count($perg_resp)){
                                            $invalido = array(

                                              'answer' => 'Invalido',
                                              'success' => -1

                                        );
                                        }
                                    }else{

                                         $invalido = array(

                                              'answer' => 'Invalido',
                                              'success' => -1

                                        );
                                    }
                                    }
                                }else{

                                     $invalido = array(

                                          'question' => 'Invalido',
                                          'success' => -1
                                       
                                    );
                                }
                            }
                        }else{

                            $invalido = array(

                              'maze' => 'Invalido',
                              'success' => -1
                           
                        );


                        }

                    }else{

                        $invalido = array(

                              'user' => 'Invalido',
                              'success' => -1
                           
                        );

                    }

                 if(isset($invalido)){
                
                
                return $invalido;

            }

        }

          if($event == "maze_start"){


               foreach ($maze_start as $key => $value) {


                  if($value == NULL){
                     
                     $erro[] = $key; 
                    
                  }
                  
               }

              if(isset($erro)){
               


              $total = array(
                         
                          'campos vazios:' => $erro

                    );
                
                return $total;

                }

               ////////Tabela Data ////////////////////////
                DB::table('data')->insertGetId(array(

                 'user_id' => $user_id,
                 'maze_id' =>  $maze_id,
                 'event'  =>   $event,
                 'question_id' => $question_id,
                 'elapsed_time' => $elapsed_time,
                 'async_timestamp' => $async_timestamp

                ));

                 $resultado = array(
                     
                      "event_name" => $event,
                      "success" => 1

                 );



             }elseif($event == "question_start"){
                    if($x!=3 || $async_timestamp==null || $wrong_count==null || $correct_count==null){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(
                        'event' =>$event,
                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp
                              
                    ));
                 $resultado = array(
                     
                      "event_name" => $event,
                      "success" => 1

                 );


                }

          }elseif($event == "question_read"){
                if($x!=3){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(
                        'event' =>$event,
                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time

                    ));
                 $resultado = array(
                     
                      "event_name" => $event,
                      "success" => 1

                 );


                }

          }elseif($event == "answer_read"){
            if($x!=4 || $answer_id==null){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(
                        'event' =>$event,
                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'answer_id'    => $answer_id 

                    ));
                 $resultado = array(
                     
                      "event_name" => $event,
                      "success" => 1

                 );

            }

          }elseif($event == "answer_interaction"){
              if($x!=4 || $answer_id==null || $correct==null){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(
                        'event' =>$event,
                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'answer_id'    => $answer_id,
                     'correct'   => $correct

                    ));

                 $resultado = array(
                     
                      "event_name" => $event,
                      "success" => 1

                 );


              }

          }elseif($event == "question_end"){
                  if($x!=3 || $async_timestamp==null || $correct==null || $wrong_count==null || $correct_count==null){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(
                        'event' =>$event,
                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'correct'   => $correct,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp

                    ));
                    
                 $resultado = array(
                     
                      "event_name" => $event,
                      "success" => 1

                 );


                  }

          }elseif($event == "maze_end"){
              if($x!=2 || $async_timestamp==null || $wrong_count==null || $correct_count==null){
                    return 'erro';
                }else{
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(
                        'event' =>$event,
                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'elapsed_time' => $elapsed_time,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp

                    ));
                    
                 $resultado = array(
                     
                      "event_name" => $event,
                      "success" => 1

                 );

              }
          }else{

                    $resultado = array(
                         
                          "event_name" => "Nome do evento nao corresponde",
                          "success" => -1

                     );


               

            
          }
          return $resultado;
             
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

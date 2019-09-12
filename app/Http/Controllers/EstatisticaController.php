<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Data;
use DateTime;
use DateTimeZone;

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


            //  $teste = (int)$resposta['async_timestamp'];

            //  $teste2 = intdiv($teste, 60);

            //  $resto = $teste%60;

            //  if($teste2 >= 60){

            //    $teste3 = intdiv($teste2, 60);

            //    $resto2 = $teste2%60;

            //   $resultado =  ($resto2 * 100) +  $resto + ($teste3 *10000);

            //  }else{

            //  $resultado =  ($teste2 * 100) +  $resto;

            // }





              //$nova = time();



           if($resposta['async_timestamp'] == 0){
                   
             $date = NULL;

           }else{
              $async_timestamp = $resposta['async_timestamp'];
              $formDate = new DateTime('', new DateTimeZone('America/Sao_Paulo'));
              $formDate->setTimeStamp($async_timestamp);
              $date = $formDate->format('Y/m/d H:i:s');
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
             $async_timestamp =  $date;
              

              $maze_start = array(

                    'user_id' =>  $user_id,
                    'maze_id' => $maze_id,
                    'question_id' => $question_id,
                    'elapsed_time' =>  $elapsed_time

              );

              $question_start = array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count
               );

                $question_read = array(

                    'user_id' =>  $user_id,
                    'maze_id' => $maze_id,
                    'question_id' => $question_id,
                    'elapsed_time' =>  $elapsed_time

               );

	             $answer_read = array(

	                 'user_id' => $user_id,
	                 'maze_id' =>  $maze_id,
	                 'event'  =>   $event,
	                 'question_id' => $question_id,
	                 'elapsed_time' => $elapsed_time,
	                 'answer_id'    => $answer_id 
	             );

	             $answer_interaction = array(


	             	 'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'event'  =>   $event,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time,
                     'answer_id'    => $answer_id,
                     'correct'   => $correct


	             );

	             $question_end = array(
                   
                     'user_id' => $user_id,
	                 'maze_id' =>  $maze_id,
	                 'event'  =>   $event,
	                 'question_id' => $question_id,
	                 'elapsed_time' => $elapsed_time,
	                 'correct'   => $correct,
	                 'wrong_count' => $wrong_count,
	                 'correct_count' => $correct_count,

	             );

                  $maze_end = array(
	                 'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'event'  =>   $event,
                     'elapsed_time' => $elapsed_time,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count
                  );


        $x=0;
        
        if($user_id!=null || $maze_id!=null){
        
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
                                }else{

                                    $invalido = array(
                                    
                                    'error' => array(

                                      'question_id' => 'invalido'
                                   ),

                                       'success' => -1
                                   );


                                    return $invalido;

                                        }
                            }
                        }else{

                          $invalido = array(

                            'error' => array(

                              'maze' => 'invalido'
                           ),

                               'success' => -1
                           );

                          return $invalido;

                        }

                    }else{

                        $invalido = array(
                            
                            'error' => array(

                              'user' => 'invalido'
                           ),

                               'success' => -1
                           );

                         return $invalido;

                    }

        }if($event == "maze_start"){


               foreach ($maze_start as $key => $value) {


                  if($value == NULL){
                     
                     $erro[] = $key; 
                    
                  }
                  
               }

              if(isset($erro)){

              $total = array(
                          'error' => array(
                          'campos vazios' => $erro
                           ),
                          'success' => -1
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
                     
                      "event_name" => "maze_start",
                      "success" => 1

                 );

                 return $resultado;

             }else if($event == "question_start"){


               foreach ($question_start as $key => $value) {


                  if($value == NULL){
                     
                     $erro[] = $key; 
                    
                  }
                  
               }

              if(isset($erro)){

              $total = array(
                          'error' => array(
                          'campos vazios' => $erro
                           ),
                          'success' => -1
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
                 'wrong_count' => $wrong_count,
                 'correct_count' => $correct_count

                ));

                 $resultado = array(
                     
                      "event_name" => "question_start",
                      "success" => 1

                 );

                 return $resultado;

             }elseif($event == "question_read"){

	                  foreach ($maze_start as $key => $value) {


	                  if($value == NULL){
	                     
	                     $erro[] = $key; 
	                    
	                  }
	                  
	               }

	              if(isset($erro)){

	              $total = array(
	                          'error' => array(
	                          'campos vazios' => $erro
	                           ),
	                          'success' => -1
	                    );
	                
	                return $total;

	                }

               
                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'event'  =>   $event,
                     'question_id' => $question_id,
                     'elapsed_time' => $elapsed_time

                    ));

	                 $resultado = array(
	                     
	                      "event_name" => "question_read",
	                      "success" => 1

	                 );

	                 return $resultado;
              

          }else if($event == "answer_read"){

               foreach ($answer_read as $key => $value) {


	                  if($value == NULL){
	                     
	                     $erro[] = $key; 
	                    
	                  }
	                  
	               }

	              if(isset($erro)){

	              $total = array(
	                          'error' => array(
	                          'campos vazios' => $erro
	                           ),
	                          'success' => -1
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
                     'answer_id'    => $answer_id 

                    ));
  
                     $resultado = array(
	                     
	                      "event_name" => "answer_read",
	                      "success" => 1

	                 );

	                 return $resultado;

          }elseif($event == "answer_interaction"){

          	  foreach ($answer_interaction as $key => $value) {


	                  if($value == NULL){
	                     
	                     $erro[] = $key; 
	                    
	                  }
	                  
	               }

	              if(isset($erro)){

	              $total = array(
	                          'error' => array(
	                          'campos vazios' => $erro
	                           ),
	                          'success' => -1
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
                     'answer_id'    => $answer_id,
                     'correct'   => $correct

                    ));

                     $resultado = array(
	                     
	                      "event_name" => "answer_interaction",
	                      "success" => 1

	                 );

	                 return $resultado;
       
          }elseif($event == "question_end"){


          	      foreach ($question_end as $key => $value) {


	                  if($value == NULL){
	                     
	                     $erro[] = $key; 
	                    
	                  }
	                  
	               }

	              if(isset($erro)){

	              $total = array(
	                          'error' => array(
	                          'campos vazios' => $erro
	                           ),
	                          'success' => -1
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
                     'correct'   => $correct,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp

                    ));


                     $resultado = array(
	                     
	                      "event_name" => "question_end",
	                      "success" => 1

	                 );

	                 return $resultado;
                    

          }elseif($event == "maze_end"){

          	          foreach ($maze_end as $key => $value) {


	                  if($value == NULL){
	                     
	                     $erro[] = $key; 
	                    
	                  }
	                  
	               }

	              if(isset($erro)){

	              $total = array(
	                          'error' => array(
	                          'campos vazios' => $erro
	                           ),
	                          'success' => -1
	                    );
	                
	                return $total;

	                }
             

                    ////////Tabela Data ////////////////////////
                    DB::table('data')->insertGetId(array(

                     'user_id' => $user_id,
                     'maze_id' =>  $maze_id,
                     'event'  =>   $event,
                     'elapsed_time' => $elapsed_time,
                     'wrong_count' => $wrong_count,
                     'correct_count' => $correct_count,
                     'async_timestamp' => $async_timestamp

                    ));

                     $resultado = array(
	                     
	                      "event_name" => "maze_end",
	                      "success" => 1

	                 );

	                 return $resultado;

          }else{

                $resultado = array(
                          'error' => array(
                          'event_name' => 'Nome do evento nao corresponde'
                           ),
                          'success' => -1
                    );
                
                return $resultado;

                }
             
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function load($id)
    {
        
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

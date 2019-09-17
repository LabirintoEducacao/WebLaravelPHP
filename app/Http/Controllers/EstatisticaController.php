<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Sala;
use App\Pergunta;
use App\Resposta;
use App\Path;
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

    	   $data = DB::table('data')->select('maze_id')->get();

    	   if(count($data) > 0){

          $sala_user = DB::table('sala_user')->where('sala_id', '=', '$data')->select('user_id','sala_id')->get();

              foreach($sala_user as $salasuser){
             
                   
                     $resultado = $salasuser->user_id;
    	     }

    	 }

    	  return view ('home')->with(['data' => $resultado]);

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

           if($resposta['async_timestamp'] == 0){
                   
             $date = NULL;

           }else{
              $async_timestamp = $resposta['async_timestamp'];
              $formDate = new DateTime('', new DateTimeZone('America/Sao_Paulo'));
              $formDate->setTimeStamp($async_timestamp);
              $date = $formDate->format('Y/m/d H:i:s');
           }
         
     
             $event = $resposta['event_name'];

             $start = DB::table('data')->where('maze_id', $resposta['maze_id'])->select('event', 'start')->get();

             foreach ($start as $value) {


                  $jogadas = $value->start;

                  if($value->start === NULL){

                       $jogadas = 1;
                  }

                  if($value->event == 'maze_end'){

                  
                    $jogadas++;


                  }

             }


              $eventos_gerais = array(

                'maze_start' => array ('event_name' => 'maze_start',
                                  'user_id'   =>  $resposta['user_id'],
                                  'maze_id' => $resposta['maze_id'], 
                                  'question_id' => $resposta['question_id'],
                                  'elapsed_time' =>  $resposta['elapsed_time']
                                ),
              'question_start' => array ('event_name' => 'question_start',
                              'user_id'   =>  $resposta['user_id'],
                              'maze_id' => $resposta['maze_id'], 
                              'question_id' => $resposta['question_id'],
                              'elapsed_time' =>  $resposta['elapsed_time'],
                              'wrong_count'  => $resposta['wrong_count'],
                              'correct_count' => $resposta['correct_count']
                            ),
              'question_read' => array ('event_name' => 'question_read',
                                'user_id'   =>  $resposta['user_id'],
                                'maze_id' => $resposta['maze_id'], 
                                'question_id' => $resposta['question_id'],
                                'elapsed_time' =>  $resposta['elapsed_time']
                              ),
              'answer_read' => array ('event_name' => 'answer_read',
                              'user_id'   =>  $resposta['user_id'],
                              'maze_id' => $resposta['maze_id'], 
                              'question_id' => $resposta['question_id'],
                              'elapsed_time' =>  $resposta['elapsed_time'],
                              'answer_id'    =>  $resposta['answer_id']
                            ),
              'answer_interaction' => array ('event_name' => 'answer_interaction',
                                              'user_id'   =>  $resposta['user_id'],
                                              'maze_id' => $resposta['maze_id'], 
                                              'question_id' => $resposta['question_id'],
                                              'elapsed_time' =>  $resposta['elapsed_time'],
                                              'answer_id'    =>  $resposta['answer_id'],
                                              'correct'      => $resposta['correct'],
                                              ),
             'question_end' => array ('event_name' => 'question_end',
                                      'user_id'   =>  $resposta['user_id'],
                                      'maze_id' => $resposta['maze_id'], 
                                      'question_id' => $resposta['question_id'],
                                      'elapsed_time' =>  $resposta['elapsed_time'],
                                      'correct'      => $resposta['correct'],
                                      'wrong_count'  => $resposta['wrong_count'],
                                      'correct_count' => $resposta['correct_count']
                                      ),
             'maze_end' => array ('event_name' => 'maze_end',
                                  'user_id'   =>  $resposta['user_id'],
                                  'maze_id' => $resposta['maze_id'], 
                                  'elapsed_time' =>  $resposta['elapsed_time'],
                                  'wrong_count'  => $resposta['wrong_count'],
                                  'correct_count' =>$resposta['correct_count']
                                  )

              );   

               $x=0;
        
        if(isset($_REQUEST['user_id']) && isset($resposta['maze_id'])){
        
            $user = DB::table('users')
                    ->where('id', '=', $resposta['user_id'])
                    ->get();
                    if(count($user)>0 || $_REQUEST['user_id'] == '0'){
                        $x++;
                        $sala = DB::table('salas')
                        ->where('id', '=', $resposta['maze_id'])
                        ->get();
                        if(count($sala)>0){
                            $x++;
                            if( $resposta['question_id'] !=null && $event != 'maze_end'){
                                $perg = DB::table('perguntas')
                                ->where('id', '=', $resposta['question_id'])
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
            }

        foreach ($eventos_gerais  as $key => $value){
            

                   if($value['event_name'] == $event){

                       $valor[] = $value;
                   }

            }  

             if(isset($valor)){


            foreach ($valor[0] as $key => $value) {


                  if($value === NULL){
                     

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

            if($_REQUEST['user_id'] == '0'){

               DB::table('data_guest')->insertGetId(array(
            'maze_id' => isset($_REQUEST['maze_id']) ? $_REQUEST['maze_id'] : NULL,
            'event'  =>   $event,
            'question_id' => isset($_REQUEST['question_id']) ? $_REQUEST['question_id'] : NULL,
            'answer_id'   =>  isset($_REQUEST['answer_id']) ? $_REQUEST['answer_id'] : NULL,
            'wrong_count'  =>  isset($_REQUEST['wrong_count']) ? $_REQUEST['wrong_count'] : NULL,
            'correct_count' => isset($_REQUEST['correct_count']) ? $_REQUEST['correct_count'] : NULL,
            'correct'       => isset($_REQUEST['correct']) ? $_REQUEST['correct'] : NULL,
            'start' => $jogadas; 
            'elapsed_time' =>  isset($_REQUEST['elapsed_time']) ? $_REQUEST['elapsed_time'] : NULL, 
            'answers_read_count' => isset($_REQUEST['answers_read_count']) ? $_REQUEST['answers_read_count'] : NULL,
            'async_timestamp' => $date

                      ));


            }else{

               //////Tabela Data ////////////////////////
                DB::table('data')->insertGetId(array(

      'user_id' => isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : NULL ,
      'maze_id' => isset($_REQUEST['maze_id']) ? $_REQUEST['maze_id'] : NULL,
      'event'  =>   $event,
      'question_id' => isset($_REQUEST['question_id']) ? $_REQUEST['question_id'] : NULL,
      'answer_id'   =>  isset($_REQUEST['answer_id']) ? $_REQUEST['answer_id'] : NULL,
      'wrong_count'  =>  isset($_REQUEST['wrong_count']) ? $_REQUEST['wrong_count'] : NULL,
      'correct_count' => isset($_REQUEST['correct_count']) ? $_REQUEST['correct_count'] : NULL,
      'correct'       => isset($_REQUEST['correct']) ? $_REQUEST['correct'] : NULL,
      'start' => $jogadas; 
      'elapsed_time' =>  isset($_REQUEST['elapsed_time']) ? $_REQUEST['elapsed_time'] : NULL, 
      'answers_read_count' => isset($_REQUEST['answers_read_count']) ? $_REQUEST['answers_read_count'] : NULL,
      'async_timestamp' => $date

                ));

            }

          

                 $resultado = array(
                     
                      "event_name" =>  $event,
                      "success" => 1

                 );

                 return $resultado;
              

             }else{

              $resultado = array(
                          'error' => array(
                          'event_name' => 'Event invalido'
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


    public function load(Request $request)
    {
        $id = $_REQUEST['user_id'];
        $maze = $_REQUEST['maze_id'];
        $lastquestion = 0;
        $gamestat = 0;
        $nextquestion = -1;
        $indexperg =0;



        $tperg = Pergunta::select('id','ordem')->where('sala_id',$maze)->orderBy('ordem')->get();
        $save =  Data::select('event','question_id','created_at')->where('user_id',$id)->where('maze_id',$maze)->get();



    foreach($tperg as $perg){
        if($indexperg == 0){

        $startquestion = $perg->id; 

        }  

        $indexperg ++;

        if($perg->id == $lastquestion){

          $stopped =  $indexperg;
          $nextquestion = $perg->ordem +1;

        }

        if($perg->ordem == $nextquestion){

          $nextquestion = $perg->id;
        }

        
        $endquestion = $perg->id;
        }

        if($nextquestion == -1){
          $nextquestion = $startquestion;
        }



       
        if(count($save)>0){

        foreach ($save as $stop) {

          if($stop->event == "maze_start"){

            $gamestat = 0;
          }


          if($stop->event == "question_end"){

            $lastquestion = $stop->question_id;

          }


          if($stop->event == "maze_end"){

            $gamestat = 1;
          }
        }


      
        if($gamestat == 0){

          $load = array(

            "stopped_question"=>$lastquestion,
            "next_question"=>$nextquestion
            
          );

          return $load;
        
        }else{

     $load = array(
          "stopped_question"=>$endquestion,
          "next_question"=>NULL
        );

     return $load;

        }

}else{

$load = array(

            "stopped_question"=> NULL,
            "next_question"=>$startquestion
            
          );
          
          return $load;
}

    }


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

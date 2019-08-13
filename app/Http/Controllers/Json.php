<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Sala;
use App\Pergunta;
use App\Resposta;
use App\Path;



class Json extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {   
        
               
// --------------------- Consultando Dados da Tabela ------------------//


          $pergunta =  Pergunta::select('id','tipo_perg','pergunta','room_type')->where('sala_id', $id)->whereNotNull('ordem')->orderBy('ordem')->get();
          $prox_pergunta =  Pergunta::select('id')->where('sala_id', $id)->whereNotNull('ordem')->orderBy('ordem')->get();
          $sala = Sala::find($id);


$controle =0;
   

// Lógica para saber Qual a próxima pergunta a exibir !!!!!!!

   foreach($prox_pergunta as $proxima){
    
    $prox = $proxima->id;

    $proxpergid [] = $prox;
    //$contagem++; //Contagem 
    
   }
       

$i=0;
$flag = 0;


// --------------------- Começo do Foreach das Perguntas------------------//
   foreach  ($pergunta as $perg) {
    $i++;   

    $pergid = $perg->id;
    $contrespref = 0;
    $contpath = 0;
     $contresp = 0;
    unset($resposta);
    unset($arresp);
    unset($paths);
    unset($reforco);
    unset($respref);
    unset($respost);
    $contagem =0;
    $contagemperg = 0;

     //- Puxando o id das resposta da tabela de Relação Perg_resp
    $reforcoid = DB::table('perg_ref')->where('perg_id',$pergid)->get();

    //- Puxando o id das resposta da tabela de Relação Perg_resp
    $respostaid = DB::table('perg_resp') ->where('perg_id',$pergid)->get();

    // - Puxando o id dos Paths
    $pathid = DB::table('path_perg') ->where('perg_id',$pergid)->get();


// ------------------ Perunta Reforço ------------------------- 

if(count($reforcoid) == 0){

    $idref =0;
}


if(count($reforcoid) > 0){

        $idref = $reforcoid[0]->ref_id;
        $idperg = $reforcoid[0]->perg_id;



 $reforco =  Pergunta::select('id','tipo_perg','pergunta','room_type')->where('id', $idref)->get();


 $ref_resp = DB::table('perg_resp')->select('resp_id') ->where('perg_id',$idref)->get();
    
 $pathreforco = DB::table('path_perg') ->where('perg_id',$idref)->get();

 $pathrefs = Path::select('ambiente_perg','tamanho','largura','disp')->where('id',$pathreforco[0]->path_id)->get();


// --------------------------- Path Pergunta Reforço-------------------//

 if($pathrefs[0]->disp == 0){

                    $dispref = false;
                }


                if($pathrefs[0]->disp == 1){

                    $dispref = true;
                }


                $pathref = array(
                'availability' => $dispref,
                'widht' => $pathrefs[0]->largura,
                'heigh' => $pathrefs[0]->tamanho,
                'type' => $pathrefs[0]->ambiente_perg,
                'conect_question' => $idperg 
            );

                 if( $pathref['availability'] == true){

                       $conttrue = 3;
                   }else{

                      $conttrue = 5;

                   }

            $contpathref = strlen (implode ( " ",$pathref)) + 60 + $conttrue;
           
       







 // ------------------ Perunta Reforço -------------------------    

foreach ($ref_resp as  $value) {

 $idresp = $value->resp_id;

 $respostaref =  Resposta::select('id','tipo_resp','resposta','corret')->where('id',$idresp )->get();     

                if($respostaref[0]->corret == 0) {

                    $answ = false;
                }

                if($respostaref[0]->corret == 1) {

                    $answ = true;
                }



                $resp_ref = array(
                'answer_id' => $respostaref[0]->id,
                'answer' => $respostaref[0]->resposta,
                'correct'=> $answ
            );
                $respref[] = $resp_ref;
                    

                   if( $resp_ref['correct'] == true){

                       $conttrue = 38;
                   }else{

                      $conttrue = 40;

                   }

                   $teste = strlen (implode ( " ",$resp_ref));
                   $x = $contrespref;
                   $contrespref = $x+ $teste + $conttrue;
                   


             

 }


               


               $ref = array(
                'question_id' => $reforco[0]->id,
                'question_type' => $reforco[0]->tipo_perg,
                'question' => $reforco[0]->pergunta,
                'room_type' => $reforco[0]->room_type,
                'path' => $pathref,
                'answer' => $respref

 );


             // Contar letras do contrref 
               $contref = array(
                'question_id' => $reforco[0]->id,
                'question_type' => $reforco[0]->tipo_perg,
                'question' => $reforco[0]->pergunta,
                'room_type' => $reforco[0]->room_type


                 );



             $contrefref = strlen (implode ( " ",$contref)) + 61 ;       
       
            $contagemref = ( $contrefref + $contpathref + $contrespref );
            $contagem = $contagem + $contagemref;
      

 }

    // Puxando as respostas com o id da tabela de relação !!!!!
    foreach ($respostaid as   $value) {

       $id = $value->resp_id;
      $resposta =  Resposta::select('id','tipo_resp','resposta','corret')->where('id', $id)->get();  

    // Preenchendo os campos do json com as respostas !!!!!!!
           
       if($resposta[0]->corret == 0) {

                    $answ = false;
                }

                if($resposta[0]->corret == 1) {

                    $answ = true;
                }


      $arresp = array(
                'answer_id' => $resposta[0]->id,
                'answer' => $resposta[0]->resposta,
                'correct'=> $answ
);
            $respost[] = $arresp;



                  if( $arresp['correct'] == true){

                       $conttrue = 38;
                   }else{

                      $conttrue = 40;

                   }

                    $teste = strlen (implode ( " ",$arresp));
                   $x = $contagemperg;
                   $contagemperg = $x+ $teste+$conttrue;
              
     

    }

   

     //Puxando os path com id da tabela relação path_perg
    foreach ($pathid as $value) {

$path = Path::select('ambiente_perg','tamanho','largura','disp')->where('id',$value->path_id)->get();

        $conttrue = 62;

        if($path[0]->disp == 1){

            $disponivel = "right";
             if($i < count($proxpergid)){
            $conect = $proxpergid[$i];
            }
        }

        if($path[0]->disp == 0){

            $disponivel = "wrong";
            $conect = $idref;

        }




        if($i < count($proxpergid)){ // Repetição das proximas perguntas

    // Definindo os campos do Jason com o path
      $pat= array(
                'availability' => $disponivel,
                'widht' => $path[0]->largura,
                'heigh' => $path[0]->tamanho,
                'type' => $path[0]->ambiente_perg,
                'conect_question' => $conect
            );

        }

        if ($i >= count($proxpergid)){  // Verificando se é ultima pergunta

             // Definindo os campos do Jason com o path

            if($path[0]->disp == 1){

                $conttrue = 58;

                $pat= array(
                    'availability' => $disponivel,
                    'widht' => $path[0]->largura,
                    'heigh' => $path[0]->tamanho,
                    'type' => $path[0]->ambiente_perg,
                    'end_game'=> true
                );
            }
                if($path[0]->disp == 0){

    

                    $pat= array(
                        'availability' => $disponivel,
                        'widht' => $path[0]->largura,
                        'heigh' => $path[0]->tamanho,
                        'type' => $path[0]->ambiente_perg,
                        'conect_question'=> $conect
                    );
                }       
           }

                 
        
                  $paths[]= $pat;

                $teste = strlen (implode ( " ",$pat));
                   $x = $contagemperg;
                   $contagemperg = $x+ $teste + $conttrue;
            

    }


    //Preenchendo os campos do json com as perguntas !!!!!!
    foreach ($perg as $key => $value) {

                
  
               $perguntas = array(
                'question_id' => $perg->id,
                'question_type' => $perg->tipo_perg,
                'question' => $perg->pergunta,
                'room_type' => $perg->room_type,
                'path' => $paths,
                'answer' =>  $respost


 );


                   

                $contperguntas = array(
                'question_id' => $perg->id,
                'question_type' => $perg->tipo_perg,
                'question' => $perg->pergunta,
                'room_type' => $perg->room_type,


 );


                $teste = strlen (implode ( " ",$contperguntas));
                   $x = $contagemperg;
                   $contagemperg = $x+ $teste;
                     
    }



$jsnnn = array (
       'maze_id' => $sala->id,
       'starting_question'=> $proxpergid [0],
       'time_limit' => $sala->duracao,
        'theme' => $sala->tematica,
         );


$teste = strlen (implode ( " ",$jsnnn));
$contjsn =  $teste + 71;




$total = $contagemperg + $contagem;

echo "</br>" . "contagemperg :". $contagemperg .  "</br>".  "contagem :" . $contagem . "Total :" . $total . " contjsn ". $contjsn;






 //----------------- Array das perguntas -------------//


         if(count($reforcoid) > 0){
             $arperg [] = $perguntas;
            $arperg [] = $ref; 

 
}


  if(count($reforcoid) == 0){

     $arperg [] = $perguntas;

 

  }
 


  echo "</br>"."-------------------Separador de blocos ---------------"."</br>";



 $controle = $controle + $total;



if($flag == 0 ) {

$controle = $controle + $contjsn ;

  if ( $controle <= 2500 ) {

   $jsn = [
       "maze_id" => $sala->id,
       "starting_question"=> $proxpergid [0],
       "time_limit" => $sala->duracao,
        "theme" => $sala->tematica,
        "questions" => $arperg
];

  }

  if ( $controle > 2500 ) {

   //programação

    $flag ++;
  }



}

}

 //-----^^^^^^^^^^  Fim dos foreach das Perguntas ^^^^^^--------------//  

       $jsn = [
       "maze_id" => $sala->id,
       "starting_question"=> $proxpergid [0],
       "time_limit" => $sala->duracao,
        "theme" => $sala->tematica,
        "questions" => $arperg
        

    ];

 
 //echo json_encode($jsn);

  //return view('qrcode')->with(['json'=>  json_encode($jsn) ]);

 



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

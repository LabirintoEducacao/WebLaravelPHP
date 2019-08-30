<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Sala;
use App\Pergunta;
use App\Resposta;
use App\Path;
use QrCode; 



class Json extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $salaid = $id;
        return view('qrcode',['data' => $salaid] );
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


$salaid = $sala->id;  
$ijson = 0;
$conta =0;
$limite = 200;
$n=1;

// Lógica para saber Qual a próxima pergunta a exibir !!!!!!!

   foreach($prox_pergunta as $proxima){
    
    $prox = $proxima->id;

    $proxpergid [] = $prox;
    //$contagem++; //Contagem 
    
   }
       

$i=0;



// --------------------- Começo do Foreach das Perguntas------------------//
   foreach  ($pergunta as $perg) {
    $i++;   


    $pergid = $perg->id;
    unset($resposta);
    unset($arresp);
    unset($paths);
    unset($reforco);
    unset($respref);
    unset($respost);

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

      
                $path_ref[]=$pathref;
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
                    

 }


               $ref = array(
                'question_id' => $reforco[0]->id,
                'question_type' => $reforco[0]->tipo_perg,
                'question' => $reforco[0]->pergunta,
                'room_type' => $reforco[0]->room_type,
                'path' => $path_ref,
                'answer' => $respref
);



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


     

    }

   

     //Puxando os path com id da tabela relação path_perg
    foreach ($pathid as $value) {

$path = Path::select('ambiente_perg','tamanho','largura','disp')->where('id',$value->path_id)->get();

        

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

         $end = 1;
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

                 $paths [] = $pat;

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

               
    }





 //----------------- Array das perguntas -------------//


         if(count($reforcoid) > 0){
             $arperg [] = $perguntas;
            $arperg [] = $ref; 

 
}


  if(count($reforcoid) == 0){

     $arperg [] = $perguntas;

 

  }

 
$jsn = [
       "maze_id" => $sala->id,
       "starting_question"=> $proxpergid [0],
       "time_limit" => $sala->duracao,
        "theme" => $sala->tematica,
        "questions" => $arperg
        
 ]; 

 }



//  //-----^^^^^^^^^^  Fim dos foreach das Perguntas ^^^^^^--------------//  

  
$fp = fopen('sala'.DIRECTORY_SEPARATOR.$salaid.DIRECTORY_SEPARATOR.'teste.json', 'w');

 fwrite($fp, json_encode($jsn));
 fclose($fp);




$gzdata = gzencode(json_encode($jsn) , 9);
$fp = fopen('sala'.DIRECTORY_SEPARATOR.$salaid.DIRECTORY_SEPARATOR.'json.zip', "w");
fwrite($fp, $gzdata);
fclose($fp);


$myfile = file_get_contents( 
'sala'.DIRECTORY_SEPARATOR.$salaid.DIRECTORY_SEPARATOR.'json.zip'); 


$base = base64_encode($myfile);




$total = strlen($base);



$cast = $total / $limite;

$ntotal = intval($cast);

$cast = number_format($cast, 2, '.', ',');

$cast = substr($cast, -2);




if($cast > 0){
$ntotal = $ntotal + 1;
}


if ($total <= $limite){

$append  = "append|" . $n . "|" . $ntotal ."|";
$qr = $append.$base;
// $qr = $base;
QrCode::format('png')->size(500)->generate($qr,'../public/sala'.DIRECTORY_SEPARATOR.$salaid.DIRECTORY_SEPARATOR.$n.'.png');

}


if($total > $limite){

while($conta < $total){


$rest = substr($base, $conta, $limite);
$conta = $conta + strlen($rest);


$append  = "append|" . $n . "|" . $ntotal ."|";
$qr = $append.$base;

QrCode::format('png')->size(500)->generate( $qr , '../public/sala'.DIRECTORY_SEPARATOR.$salaid.DIRECTORY_SEPARATOR.$n.".png");
$n ++;

}


}



 

}
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function api(Request $request)
    {



          $pergunta =  Pergunta::select('id','tipo_perg','pergunta','room_type')->where('sala_id', $id)->whereNotNull('ordem')->orderBy('ordem')->get();
           $prox_pergunta =  Pergunta::select('id')->where('sala_id', $id)->whereNotNull('ordem')->orderBy('ordem')->get();
             $sala = Sala::find($id);



   


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

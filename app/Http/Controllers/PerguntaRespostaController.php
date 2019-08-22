<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Pergunta;
use App\Path;
use App\Resposta;
use App\Sala;

class PerguntaRespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    //      $data = \App\Sala::all ();
    //     return view ( 'edit_sala' )->withData ( $data );
    // }


    public function index2($id)
    {
      // dessa forma mostra sem paginação uma lista de usuarios
      //return view('admin.users.index')->with('users', User::all());

      //Com paginação
        $perguntas = Pergunta::where('sala_id', '=', $id)->paginate(5);
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$id)
            ->get();
        $perg_resps =  DB::table('perg_resp')
            ->get();
      return view('teste_perg')->with(['data' => $perguntas, 'resps' =>$respostas, 'perg_resps' => $perg_resps]);
    }
    
    
    public function index($id)
    {

        $ref =0; 
        
        $perguntas = Pergunta::where('sala_id', $id)->whereNotNull('ordem')
        ->orderBy('ordem')->paginate(10);
        $path_perg = DB::table('path_perg')
            ->get();
        $paths = DB::table('paths')
            ->get();
        $ref = DB::table('perguntas')
            ->where('sala_id','=',$id )->whereNull('ordem')
            ->get();

        $pergs = DB::table('perguntas')
            ->where('sala_id','=',$id )->whereNotNull('ordem')
            ->orderBy('ordem')
            ->get();






                $perg_ref = 0;

            foreach ($perguntas as $value) {
              
                $perg_ref = DB::table('perg_ref')->where('perg_id', $value->id)->get();

                if (count($perg_ref) >0 ){

                    $pergref = $perg_ref;

                }            
            }






        if(count($pergs)>0){
            $count_pergs=count($pergs);
        }else{
            $count_pergs=0;
        }
        
        
        if(count($ref)>0){
            $count_ref=count($ref);
        }else{
            $count_ref=0;
        }
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$id)
            ->get();
        $perg_resp =  DB::table('perg_resp')
            ->get();   
        return view ( 'edit_sala', ['id' => $id] )->with(['data' => $perguntas, 'respostas' => $respostas, 'perg_resp' => $perg_resp, 'path_perg' => $path_perg, 'paths' => $paths,'pergs'=>$pergs,'c_perg'=>$count_pergs,'c_ref'=>$count_ref, 'reforco'=> $pergref, 'perg_ref' =>$ref]);
    }
    
    public function alterar(Request $request){
    if($request->ajax())
      {
            $lista = $request->lista;
            $y=1;
            for($count = 0; $count < count($lista); $count++)
            {
                    
                    $perg = Pergunta::find($lista[$count]);
                    $perg->ordem=$y;
                    $perg->save();
           
                        
                $y++;

            }

     return response()->json(['success' => 'sucesso.']);

     }

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

    public function edit_resp(Request $request){
        $data = $request->all();
        DB::table('respostas')
            ->where('id','=', $data['resposta_id'])
            ->update(['tipo_resp' => $data['resposta_type'],'resposta' => $data['resposta_name'],'corret' => $data['resposta_correct']]);

        $perg = DB::table('perguntas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();
            $notification = array(
                'message' => 'Resposta alterada com sucesso!!',
                'alert-type' => 'success'
            );
        return redirect('admin/editar-sala/'. $data['sala_id'])->with(['data' => $perg, 'respostas' => $respostas])->with($notification);
    }

    public function edit_perg(Request $request){
        $data = $request->all();
        DB::table('perguntas')
            ->where('id','=', $data['pergunta_id'])
            ->update(['tipo_perg' => $data['pergunta_type'],'pergunta' => $data['pergunta_name'],'room_type' => $data['perg_room_type']]);
            DB::table('paths')
                ->where('id','=',$data['pergunta_path'])
                ->update(['ambiente_perg' => $data['pergunta_ambiente'],'tamanho' => $data['pergunta_tamanho'], 'largura' => $data['pergunta_largura']]);
                
        $perg = DB::table('perguntas')
            ->where('sala_id','=',$data['sala_id'] )->whereNotNull('ordem')
            ->orderBy('ordem')
            ->get();
        $path_perg = DB::table('path_perg')
            ->get();
        $paths = DB::table('paths')
            ->get();
        $ref = DB::table('perguntas')
            ->where('sala_id','=',$data['sala_id'] )->whereNull('ordem')
            ->orderBy('ordem')
            ->get();
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();
        $perg_resp =  DB::table('perg_resp')
            ->get();   

        $notification = array(
                'message' => 'Pergunta alterada com sucesso!!',
                'alert-type' => 'success'
            );

        return redirect('admin/editar-sala/'. $data['sala_id'])->with(['data' => $perg, 'ref' => $ref, 'respostas' => $respostas, 'perg_resp' => $perg_resp, 'path_perg' => $path_perg, 'paths' => $paths])->with($notification);
    }
    
    
    public function edit_ambi(Request $request){
        $data = $request->all();
        DB::table('paths')
                ->where('id','=',$data['path_id'])
                ->update(['ambiente_perg' => $data['pergunta_ambientex'],'tamanho' => $data['pergunta_tamanhox'], 'largura' => $data['pergunta_largurax']]);
        $perg = DB::table('perguntas')
            ->where('sala_id','=',$data['sala_id'] )->whereNotNull('ordem')
            ->orderBy('ordem')
            ->get();
        $path_perg = DB::table('path_perg')
            ->get();
        $paths = DB::table('paths')
            ->get();
        $ref = DB::table('perguntas')
            ->where('sala_id','=',$data['sala_id'] )->whereNull('ordem')
            ->orderBy('ordem')
            ->get();
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();
        $perg_resp =  DB::table('perg_resp')
            ->get(); 


        $notification = array(
                'message' => 'Ambiente alterado com sucesso!!',
                'alert-type' => 'success'
            );

        return redirect('admin/editar-sala/'. $data['sala_id'])->with(['data' => $perg, 'ref' => $ref, 'respostas' => $respostas, 'perg_resp' => $perg_resp, 'path_perg' => $path_perg, 'paths' => $paths])->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         $salaid = $request->sala_id;
         $ordem = Pergunta::select('ordem')->where('sala_id', $salaid)->orderBy('ordem')->get();

           foreach ($ordem as $value){
               $teste = $value->ordem;
             }

       
         if(isset($teste)){

           $teste ++;

         }
         if(!isset($teste)){

            $teste = 0;
         }


      if($request->ajax())
       {
          

          $rules = array(
                    'resposta.*' => 'required',
                    'resposta_ref.*' => 'required'

                );
              
              $error = Validator::make($request->all(), $rules);

              if($error->fails())
              {
                return response()->json(['error' => $error->errors()->all()]);

              }  
          
                        ////////Perguntas///////////
                     $sala_id = $request->sala_id;
                     $tipo_perg = $request->question_type;
                     $pergunta = $request->pergunta;
                     $room_type = $request->room_type;

                     ///////////Path////////////
                     $ambiente_perg = $request->answer_boolean;
                     $tamanho = $request->tamanho;
                     $largura = $request->largura;
                     $disponivel = true;
          
                    ////////Tabela Pergunta ////////////////////////
                    $pergid = DB::table('perguntas')->insertGetId(array(

                    'sala_id' => $sala_id,
                    'tipo_perg' => $tipo_perg,
                    'pergunta' => $pergunta,
                    'ordem' =>   $teste,
                    'room_type' => $room_type

                    ));



                    ////////////Tabela Path//////////////////
                    $pathid = DB::table('paths')->insertGetId(array(

                    'ambiente_perg' => $ambiente_perg,
                    'tamanho' => $tamanho,
                    'largura' => $largura,
                    'disp' => $disponivel


                    ));

                
                    DB::table('path_perg')->insert(array('perg_id' => $pergid, 'path_id' => $pathid));
          
          
                      /////Resposta1////////////
                      $tipo_resp = $request->tipo_resp;
                      $resposta = $request->resposta;
                      $corret = $request->corret;
                      $sala_id = $request->sala_id;
                    

                      for($count = 0; $count < count($resposta); $count++)
                      {
                          
                        $id = DB::table('respostas')->insertGetId(array(

                                 'sala_id'  =>  $sala_id,
                                 'tipo_resp' => $tipo_resp[$count],
                                 'resposta' => $resposta[$count],
                                 'corret' => $corret[$count]


                           ));

                       DB::table('perg_resp')->insert(array('perg_id' => $pergid, 'resp_id' => $id));

                      }

                 if($request->perg_reforco==1){



                     //  ////////////////Patch errado da Pergunta/////////
                     $ambiente = $request->answer_boolean_perg;
                     $tamanho_perg = $request->tamanho_perg;
                     $largura_perg = $request->largura_perg;
                     $disponivel_perg = false;
                              
                     ////////Perguntas///////////

                     $sala_id_ref = $request->sala_id;
                     $tipo_perg_ref = $request->question_type_ref;
                     $pergunta_ref = $request->reforco;
                     $room_type_ref = $request->room_type_ref;


                     /////Resposta2////////////
                     $tipo_resp_ref = $request->tipo_resp_ref;
                     $resposta_ref = $request->resposta_ref;
                     $corret_ref = $request->corret_ref;


                     ////////////////PatchReforco/////////
                     $ambiente_ref = $request->answer_boolean_ref;
                     $tamanho_ref = $request->tamanho_ref;
                     $largura_ref = $request->largura_ref;
                     $disponivel_ref = true;


                     ////////////Tabela Path ambiente errado//////////////////
                     $pathidperg = DB::table('paths')->insertGetId(array(
                         'ambiente_perg' =>  $ambiente,
                         'tamanho' =>   $tamanho_perg,
                         'largura' => $largura_perg,
                         'disp' => $disponivel_perg
                     ));
                     
                     ////////////Tabela Path//////////////////
                     $pathidref = DB::table('paths')->insertGetId(array(
                         'ambiente_perg' =>  $ambiente_ref,
                         'tamanho' =>   $tamanho_ref,
                         'largura' => $largura_ref,
                         'disp' => $disponivel_ref
                     ));

                     ////////Tabela Pergunta ////////////////////////
                     $pergid2 = DB::table('perguntas')->insertGetId(array(
                        'sala_id' => $sala_id_ref,
                        'tipo_perg' => $tipo_perg_ref,
                        'pergunta' => $pergunta_ref,
                        'room_type' => $room_type_ref
                    ));  
                     
                     DB::table('path_perg')->insert(array('perg_id' => $pergid, 'path_id' =>  $pathidperg));

                     DB::table('path_perg')->insert(array('perg_id' => $pergid2, 'path_id' =>  $pathidref));
                                       
                     DB::table('perg_ref')->insert(array('perg_id' => $pergid, 'ref_id' => $pergid2));

                     
                     ////////////////Tabela Resposta2//////////////////////

                     for($i = 0; $i < count($resposta_ref); $i++)
                     {
                         $reforcoid = DB::table('respostas')->insertGetId(array(
                             
                             'sala_id'  =>  $sala_id,
                             'tipo_resp' => $tipo_resp_ref[$i],
                             'resposta' => $resposta_ref[$i],
                             'corret' => $corret_ref[$i]
                             
                             
                         ));
                         
                         
                         DB::table('perg_resp')->insert(array('perg_id' => $pergid2, 'resp_id' => $reforcoid));

                    }

                }

            return response()->json(['success' => 'sucesso.']);
              
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
        $resp = DB::table('perg_resp')
                ->select('resp_id')
                ->where('perg_id', '=', $id)
                ->get();

        $perguntaref = DB::table('perg_ref')
                ->where('perg_id', '=', $id)
                ->get();


        $path = DB::table('path_perg')
                ->select('path_id')
                ->where('perg_id', '=', $id)
                ->get();


        $perg = Pergunta::find($id);


         if(count($path)> 0){

                foreach ($path as $path_id) {
                    DB::table('paths')->where('id', '=', $path_id->path_id)->delete();
                }

         }


         if(count($perguntaref)> 0){

               $ref = $perguntaref[0]->ref_id; 
                   $resp2 = DB::table('perg_resp')
                    ->select('resp_id')
                    ->where('perg_id', '=', $ref)
                    ->get();
               $path_ref = DB::table('path_perg')
                         ->where('perg_id', '=', $perguntaref[0]->ref_id)
                         ->get();
                DB::table('paths')->where('id', '=', $path_ref[0]->path_id)->delete();
               DB::table('perguntas')->where('id', $ref)->delete();

                  foreach ($resp2 as $resp_id2) {
                    DB::table('respostas')->where('id', $resp_id2->resp_id)->delete();
                }

         }

         
        
        DB::table('perg_resp')->where('perg_id', '=', $id)->delete();
        DB::table('perguntas')->where('id', '=', $id)->delete();

      
        foreach ($resp as $resp_id) {
            DB::table('respostas')->where('id', '=', $resp_id->resp_id)->delete();
        }
        
        $notification = array(
                'message' => 'Pergunta deletada com sucesso!!',
                'alert-type' => 'success'
            );
        return redirect('admin/editar-sala/'. $perg->sala_id)->with($notification);
    }

    public function destroyresp($id)
    {
        $resp = DB::table('respostas')
                ->select('sala_id')
                ->where('id', '=', $id)
                ->get();
         //$resposta = Respostas::find($id);
        DB::table('perg_resp')->where('resp_id', '=', $id)->delete();
        DB::table('respostas')->where('id', '=', $id)->delete();
        $notification = array(
                'message' => 'Resposta deletada com sucesso!!',
                'alert-type' => 'success'
            );
        return redirect('admin/editar-sala/'. $resp[0]->sala_id)->with($notification);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Pergunta;
use App\Path;
use App\Reforco;
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

    public function index($id)
    {
        
        $perg = DB::table('perguntas')
            ->where('sala_id','=',$id)
            ->orderBy('ordem')
            ->get();
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$id)
            ->get();
        $perg_resp =  DB::table('perg_resp')
            ->get();   
        return view ( 'edit_sala', ['id' => $id] )->with(['data' => $perg, 'respostas' => $respostas, 'perg_resp' => $perg_resp]);
    }
    
    public function alterar(Request $request){
    if($request->ajax())
      {
            $lista = $request->lista;
            $end_game=0;  
            $y=1;
            for($count = 0; $count < count($lista); $count++)
            {
                $perg_resp = DB::table('perg_resp')
                    ->where('id','=', $lista[$count])
                    ->get();
                foreach ($perg_resp as $pergresp) {
                    $x = Resposta::find($pergresp->resp_id);
                    if($x->end_game==1)
                        $end_game = $lista[$count];
                }
                if($lista[$count]!=$end_game){
                    if(next($lista)){
                        $perg = Pergunta::find($lista[$count]);
                        $perg->ordem=$y;
                        $perg->save();
                    }else{
                        $perg = Pergunta::find($lista[$count]);
                        $perg->ordem=8;
                        $perg->save();
                    }
                        
                    
                }
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
        if($request->input('resposta_end') == null)
            $end=0;
        else
            $end=1;
        DB::table('respostas')
            ->where('id','=', $data['resposta_id'])
            ->update(['tipo_resp' => $data['resposta_type'],'resposta' => $data['resposta_name'],'corret' => $data['resposta_correct'],'end_game' => $end]);

        $perg = DB::table('perguntas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();
            
        return redirect('admin/editar-sala/'. $data['sala_id'])->with(['data' => $perg, 'respostas' => $respostas])->with('success', 'Resposta alterada com sucesso!');
    }

    public function edit_perg(Request $request){
        $data = $request->all();
        DB::table('perguntas')
            ->where('id','=', $data['pergunta_id'])
            ->update(['tipo_perg' => $data['pergunta_type'],'pergunta' => $data['pergunta_name'],'ambiente_perg' => $data['pergunta_ambiente'],'tamanho' => $data['pergunta_tamanho'], 'largura' => $data['pergunta_largura']]);

        $perg = DB::table('perguntas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$data['sala_id'])
            ->get();

        return redirect('admin/editar-sala/'. $data['sala_id'])->with(['data' => $perg, 'respostas' => $respostas])->with('success', 'Pergunta alterada com sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
                     $proxima = 0;
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
                    'ordem' => $proxima,
                    'room_type' => $room_type

                    ));

                    $statement = DB::select("SHOW TABLE STATUS LIKE 'perguntas'");
                    $nextId = $statement[0]->Auto_increment;


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
          
                        ////////////////Reforco/////////
                     
                     $tipo_perg_ref = $request->question_type_ref;
                     $reforco = $request->reforco;
                     $ambiente_ref = $request->answer_boolean_ref;
                     $tamanho_ref = $request->tamanho_ref;
                     $largura_ref = $request->largura_ref;
                     $room_type_ref = $request->room_type_ref; 

                      /////Resposta2////////////
                      $tipo_resp_ref = $request->tipo_resp_ref;
                      $resposta_ref = $request->resposta_ref;
                      $corret_ref = $request->corret_ref;
            
            
            ///////////////Tabela Perguntas de Reforço///////////////
             $refid = DB::table('reforcos')->insertGetId(array(
                     'id' =>  $nextId,
                     'perg_id' => $pergid,
                     'tipo_perg_ref' => $tipo_perg_ref,
                     'reforco' => $reforco,
                     'ambiente_ref' => $ambiente_ref,
                     'tamanho_ref' => $tamanho_ref,
                     'largura_ref' => $largura_ref,
                     'disp' => $disponivel,
                     'room_type_ref' => $room_type_ref 
            
                   ));

              

            ////////////////Tabela Resposta2//////////////////////

              for($i = 0; $i < count($resposta_ref); $i++)
                {
                    $reforcoid = DB::table('respostas')->insertGetId(array(

                             'sala_id'  =>  $sala_id,
                             'tipo_resp' => $tipo_resp_ref[$i],
                             'resposta' => $resposta_ref[$i],
                             'corret' => $corret_ref[$i],


                       ));
                     

             DB::table('ref_resp')->insert(array('ref_id' => $refid, 'resp_id' => $reforcoid));

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
        $perg = Pergunta::find($id);
        
        DB::table('perg_resp')->where('perg_id', '=', $id)->delete();
        DB::table('perguntas')->where('id', '=', $id)->delete();
        foreach ($resp as $resp_id) {
            DB::table('respostas')->where('id', '=', $resp_id->resp_id)->delete();
        }
        
        return redirect('admin/editar-sala/'. $perg->sala_id)->with('warning', 'Pergunta deletada com sucesso!');
    }

    public function destroyresp($id)
    {
        $resp = DB::table('respostas')
                ->select('sala_id')
                ->where('id', '=', $id)
                ->get();
        // $resposta = Respostas::find($id);
        DB::table('perg_resp')->where('resp_id', '=', $id)->delete();
        DB::table('respostas')->where('id', '=', $id)->delete();
        return redirect('admin/editar-sala/'. $resp[0]->sala_id)->with('warning', 'Resposta deletada com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pergunta;
use App\Resposta;
use App\Sala;

class PerguntaRespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view ( 'edit_sala', ['id' => $id] );
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

      
           $request->validate([

                  'resposta' => 'required',
                  'pergunta' => 'required'

           ]);            
             $resposta = new Resposta();
             $resposta->tipo_resp = $request->get("answer_tipo");
             $resposta->resposta = $request->get("resposta");
             $resposta->corret = $request->get("answer-definitions");  
             $resposta->save();
              
             $proxima = 0;
             $disponivel = true;

             $pergunta = new Pergunta();
             $pergunta->sala_id = $request->get('id_sala');
             $pergunta->tipo_perg = $request->get('question_type');
             $pergunta->pergunta = $request->get('pergunta');
             $pergunta->ambiente_perg = $request->get('answer_boolean');
             $pergunta->tamanho = $request->get('tamanho');
             $pergunta->largura = $request->get('largura');     
             $pergunta->prox_perg = $proxima; 
             $pergunta->disp = $disponivel;    
             $pergunta->save();
        
        
//        for($x=1;$x<=$request->input('respMax');$x++){
//                 $answer_tipo = "answer_tipo" +$x;
//                 $resposta = "resposta" +$x;
//                 $answer_definitions = "answer-definitions" +$x;
//
//                 $resposta->tipo_resp = $request->input($answer_tipo);
//                 $resposta->resposta = $request->input($resposta);
//                 $resposta->corret = $request->input($answer_definition);  
//                 $resposta->save();
//             }
//              
//             
//            for($x=1;$x<=$request->input('pergMax');$x++){
//                 $question_type = "question_type" +$x;
//                 $pergunta = "pergunta" +$x;
//                 $answer_boolean = "answer_boolean" +$x;
//                 $tamanho = "tamanho" +$x;
//                 $largura = "largura" +$x;
//                
//                 $pergunta->sala_id = $id_sala;
//                 $pergunta->tipo_perg = $request->input($question_type);
//                 $pergunta->pergunta = $request->input($pergunta);
//                 $pergunta->ambiente_perg = $request->input($answer_boolean);
//                 $pergunta->tamanho = $request->input($tamanho);
//                 $pergunta->largura = $request->input($largura);     
//                 $pergunta->prox_perg = $proxima; 
//                 $pergunta->disp = $disponivel;    
//                 $pergunta->save();
//            }

              return view('edit_sala', ['id' => $request->get('id_sala')] );
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

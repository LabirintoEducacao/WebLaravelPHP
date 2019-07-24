<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    // public function index()
    // {

    //      $data = \App\Sala::all ();
    //     return view ( 'edit_sala' )->withData ( $data );
    // }

    public function index($id)
    {
        
        $perg = DB::table('perguntas')
            ->where('sala_id','=',$id)
            ->get();
        $respostas = DB::table('respostas')
            ->where('sala_id','=',$id)
            ->get();
        return view ( 'edit_sala', ['id' => $id] )->with(['data' => $perg, 'respostas' => $respostas]);
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
             $resposta->sala_id = $request->get('sala_id');
             $resposta->resposta = $request->get("resposta");
             $resposta->corret = $request->get("answer-definitions");  
             $resposta->save();
              
             $proxima = 0;
             $disponivel = true;

             $pergunta = new Pergunta();
             $pergunta->sala_id = $request->get('sala_id');
             $pergunta->tipo_perg = $request->get('question_type');
             $pergunta->pergunta = $request->get('pergunta');
             $pergunta->ambiente_perg = $request->get('answer_boolean');
             $pergunta->tamanho = $request->get('tamanho');
             $pergunta->largura = $request->get('largura');     
             $pergunta->prox_perg = $proxima; 
             $pergunta->disp = $disponivel;    
             $pergunta->save();

             DB::table('perg_resp')->insert(
                array('perg_id' => $pergunta->id, 'resp_id' => $resposta->id)
            );

             return redirect('admin/editar-sala/'. $request->get('sala_id'))->with('success', 'Pergunta criada com sucesso!');
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        $perg_resp =  DB::table('perg_resp')
            ->get();   
        return view ( 'edit_sala', ['id' => $id] )->with(['data' => $perg, 'respostas' => $respostas, 'perg_resp' => $perg_resp]);
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
            'resposta.*' => 'required'
        );
      
      $error = Validator::make($request->all(), $rules);

      if($error->fails())
      {
        return response()->json(['error' => $error->errors()->all()]);

      }  


             

              $tipo_resp = $request->tipo_resp;
              $resposta = $request->resposta;
              $corret = $request->corret;
              $sala_id = $request->sala_id;
              $end_game = true;

             $tipo_perg = $request->question_type;
             $pergunta = $request->pergunta;
             $ambiente_perg = $request->answer_boolean;
             $tamanho = $request->tamanho;
             $largura = $request->largura;
             $proxima = 0;
             $disponivel = true;    


            $tipo_respr = $request->tipo_respr;
            $respostar = $request->respostar;
            $corretr = $request->corretr;

            $tipo_pergr = $request->question_typer;
            $perguntar = $request->perguntar;
            $ambiente_pergr = $request->answer_booleanr;
            $tamanhor = $request->tamanhor;
            $largurar = $request->largurar;   



       

        
    $pergid = DB::table('perguntas')->insertGetId(array(
                
             'sala_id' =>  $sala_id,
             'tipo_perg' => $tipo_perg,
             'pergunta' => $request->pergunta,
             'ambiente_perg' => $ambiente_perg,
             'tamanho' => $tamanho,
             'largura' => $largura,
             'prox_perg' => $proxima,
             'disp' => $disponivel     

           ));

    $perg_ref_id = DB::table('perguntas')->insertGetId(array(
                
             'sala_id' =>  $sala_id,
             'tipo_perg' => $tipo_pergr,
             'pergunta' => $perguntar,
             'ambiente_perg' => $ambiente_pergr,
             'tamanho' => $tamanhor,
             'largura' => $largurar,
             'prox_perg' => $proxima,
             'disp' => $disponivel     

           ));


      
      for($count = 0; $count < count($resposta); $count++)
      {
        $id = DB::table('respostas')->insertGetId(array(

                 'sala_id'  =>  $sala_id,
                 'tipo_resp' => $tipo_resp[$count],
                 'resposta' => $resposta[$count],
                 'corret' => $corret[$count],
                 'end_game' => $end_game

           ));


          DB::table('perg_resp')->insert(array('perg_id' => $pergid, 'resp_id' => $id));

      }

      for($count = 0; $count < count($respostar); $count++)
      {
        $id = DB::table('respostas')->insertGetId(array(

                 'sala_id'  =>  $sala_id,
                 'tipo_resp' => $tipo_respr[$count],
                 'resposta' => $respostar[$count],
                 'corret' => $corretr[$count],
                 'end_game' => $end_game

           ));


          DB::table('perg_resp')->insert(array('perg_id' => $perg_ref_id, 'resp_id' => $id));

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

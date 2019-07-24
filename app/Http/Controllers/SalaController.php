<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sala;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_sala');
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

                  'nome' => 'required|max:20'

           ]);

            $time = $request->input('time');

           if($time == ""){
               
            $time = 0;

           }
        
            $sala = new Sala();
            $sala->prof_id = $request->input('id_prof');
            $sala->name = $request->input('nome');
            $sala->duracao = $time;
            $sala->tematica = $request->input('theme');
            $sala->save();

            return redirect('admin/sala')->with('success', 'Sala criada com sucesso!');
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
        $sala = Sala::find($id);

        if(isset($sala)){
           $sala->delete();         
       }
      return redirect('admin/sala');
    }

    public function add_user(Request $request){
        $data = $request->all();
        DB::table('sala_user')->insert(
                array('sala_id' => $data->sala_id, 'user_id' => $data->user_id)
            );
        return redirect('admin/alunos'. $request->get('sala_id'))->with('success', 'Pergunta criada com sucesso!');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
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
            if($request->public==null)
                $sala->public=0;
            else
                $sala->public=1;
            $sala->save();
            
            $notification = array(
                'message' => 'Sala criada com sucesso!!!',
                'alert-type' => 'success'
            );
            return redirect('admin/sala')->with($notification);
    }
    
    
    public function edit_sala(Request $request)
    {
        
           $request->validate([

                  'nome' => 'required|max:20'

           ]);

            $time = $request->input('time');

           if($time == ""){
               
            $time = 0;

           }
        
            $sala = Sala::find($request->sala_id);
            $sala->name = $request->input('nome');
            $sala->duracao = $time;
            $sala->tematica = $request->input('theme');
            if($request->public==null)
                $sala->public=0;
            else
                $sala->public=1;
            $sala->save();
            $notification = array(
                'message' => 'Sala alterada com sucesso!!!',
                'alert-type' => 'success'
            );

            return redirect('admin/sala')->with($notification);
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

        $perguntas = DB::table('perguntas')
                ->where('sala_id', '=', $id)
                ->get();

        foreach($perguntas as $pergunta){
            $path = DB::table('path_perg')
                ->select('path_id')
                ->where('perg_id', '=', $pergunta->id)
                ->get();
                if(count($path)> 0){
                    foreach ($path as $path_id) {
                        DB::table('paths')->where('id', '=', $path_id->path_id)->delete();
                    }

                }
        }


        $sala = Sala::find($id);

        if(isset($sala)){
           $sala->delete();         
       }
        $notification = array(
                'message' => 'Sala deletada com sucesso!!!',
                'alert-type' => 'success'
            );
      return redirect('admin/sala')->with($notification);
    }

    public function add_user(Request $request){
        $data = $request->all();
        DB::table('sala_user')->insert(
                array('sala_id' => $data->sala_id, 'user_id' => $data->user_id)
            );
        $salas = Sala::where('public','=',1)->get();
            $notification = array(
                'message' => 'Usuário adicionado com sucesso!!!',
                'alert-type' => 'success'
            );
        return redirect('admin/alunos'. $request->get('sala_id'))->with($notification);

    }

    public function entrar(){
        $salas = Sala::all();
        
        $sala_user = DB::table('sala_user')
        ->get();

        return view('virtual')->with(['data' => $salas, 'sala_user' => $sala_user]);
    }
    public function entrar_guest(){
        $salas = Sala::where('public','=',1)->get();

        $professores = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->orderBy('name')
            ->where('role_user.role_id','=',2)
            ->get();

        return view('virtual_guest')->with(['data' => $salas,'professores' => $professores]);
    }

    public function buscar(Request $request){
        $salas = DB::table('salas')
            ->orderBy('name')
            ->where('public','=',1)
            ->where('name',$request->buscar)
            ->get();
            $professores = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->orderBy('name')
                ->where('role_user.role_id','=',2)
                ->get();
        if(count($salas)<=0){
            $salas = Sala::where('public','=',1)->get();
            $notification = array(
                'message' => 'Você não tem permissão para editar!!',
                'alert-type' => 'warning'
            );
            return redirect('virtual')->with($notification);
        }
        else
            return view('virtual_guest')->with(['data' => $salas,'professores' => $professores]);
    }


    public function indexJson()
    {

        $salas =  Sala::select('id','prof_id','name','duracao','tematica','public')->get();
         return json_decode($salas);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Sala;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\LinkCadastro;
use App\Mail\LinkSala;

class UserController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
      // dessa forma mostra sem paginação uma lista de usuarios
      //return view('admin.users.index')->with('users', User::all());

      //Com paginação
      return view('admin.users.index')->with('users', User::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {

        if(Auth::user()->id == $id){
            $notification = array(
                'message' => 'Você não tem permissão para editar!!',
                'alert-type' => 'warning'
            );
            return redirect()->route('admin.users.index')->with($notification);
        }

        return view('admin.users.edit')->with(['user'=> User::find($id), 'roles' => Role::all()]);
       
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
         if(Auth::user()->id == $id){
            $notification = array(
                'message' => 'Você não tem permissão para editar!!',
                'alert-type' => 'warning'
            );
            return redirect()->route('admin.users.index')->with($notification);
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);

        $notification = array(
                'message' => 'Usuário atualizado com sucesso!!',
                'alert-type' => 'success'
            );
        return redirect()->route('admin.users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(Auth::user()->id == $id){
        $notification = array(
                'message' => 'Você não tem permissão para deletar!!',
                'alert-type' => 'warning'
            );
       return redirect()->route('admin.users.index')->with($notification);
       }

       $user = User::find($id);

       if($user){
           $user->roles()->detach();
           $user->delete();
           $notification = array(
                'message' => 'Usuário deletado com sucesso!!',
                'alert-type' => 'success'
            );
           return redirect()->route('admin.users.index')->with($notification);
       }
       $notification = array(
                'message' => 'Este usuário não pode ser deletado!!',
                'alert-type' => 'warning'
            );
       return redirect()->route('admin.users.index')->with($notification);
    }
    
    
    /*UM ADMINISTRADOR PODE CADASTRAR UM NOVO USUARIO*/
    public function user(Request $request){
    	$data = $request->all();
    	$id = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $users = User::where('email', '=', $data['email'])->get();

        foreach ($users as $user)
        {
            $user->roles()->sync($data['type']);
        }
        
        $notification = array(
                'message' => 'Usuário cadastrado com sucesso!!',
                'alert-type' => 'success'
            );

        return redirect()->route('admin.users.index')->with($notification);

    }
    
    
    /*ENVIAR E-MAIL*/
    public function email(Request $request){
        $data = $request->all();

        $users = User::where('email', '=', $data['email'])->get();
        
        $sala = Sala::find($request->sala_id);

        foreach ($users as $user)
        {
            if($user){
                \Mail::to($data['email'])->send(new LinkSala($sala->name,Auth::user()->name,Auth::user()->id));
                $notification = array(
                'message' => 'E-mail enviado com sucesso!!',
                'alert-type' => 'success'
                );
                return redirect()->route('admin.users.index')->with($notification);
            }
        }
        \Mail::to($data['email'])->send(new LinkCadastro($sala,Auth::user()->name,Auth::user()->id));
        $notification = array(
                'message' => 'E-mail para cadastro enviado com sucesso!!',
                'alert-type' => 'success'
                );
      return redirect('admin/alunos/'. $data['sala_id'])->with($notification);
    }


    public function add_user($id)
    {

        $data = DB::table('users')
            ->join('sala_user', 'users.id', '=', 'sala_user.user_id')
            ->orderBy('name')
            ->where('sala_user.sala_id','=',$id)
            ->get();

        $alunos = \App\User::orderBy('name')->get();

        return view ( 'add_alunos', ['id' => $id] )->with(['data' => $data, 'alunos' => $alunos]);
    }


    public function store(Request $request)
    {
        $data = DB::table('sala_user')
            ->where([['sala_id','=',$request->get('sala_id')],['user_id','=',$request->get('user_id')]])
            ->get();
            var_dump(count($data));

            $user = User::find($request->get('user_id'));

            $sala = Sala::find($request->get('sala_id'));

            $prof = User::find($sala->prof_id);


        if(count($data) == 0){
             DB::table('sala_user')->insert(
                array('sala_id' => $request->get('sala_id'), 'user_id' => $request->get('user_id'))
            );

            \Mail::to($user->email)->send(new LinkSala($sala->name,$prof->name,$request->get('sala_id')));

            $notification = array(
                'message' => 'Aluno adicionado com sucesso!!',
                'alert-type' => 'success'
            );

            

        return redirect('admin/alunos/'. $request->get('sala_id'))->with($notification);
        }
        $notification = array(
                'message' => 'Aluno já cadastrado nesta sala!!',
                'alert-type' => 'warning'
            );
        return redirect('admin/alunos/'. $request->get('sala_id'))->with($notification);
    }

    public function deletar($id,$sala)
    {

        DB::table('sala_user')->where('id','=',$id)->delete();
        $notification = array(
                'message' => 'Aluno deletado com sucesso!!',
                'alert-type' => 'success'
                );

        // if(count($data) == 0){
        return redirect('admin/alunos/'. $sala)->with($notification);
        // }
        // return redirect('admin/alunos/'. $sala)->with('warning', 'Este aluno não pôde ser deletado!');
    }



}

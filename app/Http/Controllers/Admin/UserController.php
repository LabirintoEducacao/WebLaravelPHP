<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
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
            return redirect()->route('admin.users.index')->with('warning', 'você não tem permissão para editar!');
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
            return redirect()->route('admin.users.index')->with('warning', 'você não tem permissão para editar!');
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
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
       return redirect()->route('admin.users.index')->with('warning', 'você não tem permissão para deletar!');
       }

       $user = User::find($id);

       if($user){
           $user->roles()->detach();
           $user->delete();
           return redirect()->route('admin.users.index')->with('success', 'Usuário deletado com sucesso');
       }
       return redirect()->route('admin.users.index')->with('warning', 'Este usuário não pode ser deletado');
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
        
        // \Session::flash('mensagem_sucesso','O usuário não pode ser cadastrado!');

        return redirect()->route('admin.users.index')->with('success', 'Usuário cadastrado com sucesso!');

    }
    
    
    /*ENVIAR E-MAIL*/
    public function email(Request $request){
        $data = $request->all();

        $users = User::where('email', '=', $data['email'])->get();

        foreach ($users as $user)
        {
            if($user){
                \Mail::to($data['email'])->send(new LinkSala());
                
                return redirect()->route('admin.users.index')->with('success', 'E-mail enviado com sucesso!');
            }
        }
        \Mail::to($data['email'])->send(new LinkCadastro());
        
    	return redirect()->route('admin.users.index')->with('success', 'E-mail para cadastro enviado com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class ProfileController extends Controller
{
    
    public function edit(Request $request){
        $data = $request->all();
        $update = auth()->user()->update($data);
        
        if($update)
            \Session::flash('success','Perfil atualizado com sucesso!');
        else
            \Session::flash('warning','Perfil não pode ser atualizado!');
        return view('home');
        
    }
    
    public function reset_password(Request $request){
        $data = $request->all();
        
        if($data['password'] != null){
            if($data['password'] == $data['password_confirmation']){
                $data['password'] = bcrypt($data['password']);
                $update = auth()->user()->update($data);
                if($update)
                    \Session::flash('success','Senha atualizada com sucesso!');
            }else{
            unset($data['password']);
            \Session::flash('warning','A senha não pode ser atualizada!');
            }
        }else{
            unset($data['password']);
            \Session::flash('warning','A senha não pode ser atualizada!');
        }
        return view('home');
        
    }
    
    public function delete($id){
        
        $user = User::find($id);

       if($user){
           $user->roles()->detach();
           $user->delete();
           return redirect('usuario/login')->with('success', 'Usuário deletado com sucesso!');
       }
        return redirect('usuario/login')->with('warning', 'Usuário não pôde ser deletado!');
        
    }
    
        public function create(Request $request){

        var_dump($request);
//        $create = User::create($request->all());
//        if($create)
//            \Session::flash('mensagem_sucesso','Usuário criado com sucesso!');
//        else{
//            \Session::flash('mensagem_erro','Usuário não pode ser criado!');
//        }
//        return view('admin.users.index');
        
    }


}

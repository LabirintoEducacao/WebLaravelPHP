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
        
        if($update){
            $notification = array(
                'message' => 'Perfil atualizado com sucesso!',
                'alert-type' => 'success'
            );
            return redirect('admin/sala')->with($notification);
        }else
            $notification = array(
                'message' => 'Perfil não pode ser atualizado!',
                'alert-type' => 'warning'
            );
        return view('home')->with($notification);
        
    }
    
    public function reset_password(Request $request){
        $data = $request->all();
        
        if($data['password'] != null){
            if($data['password'] == $data['password_confirmation']){
                $data['password'] = bcrypt($data['password']);
                $update = auth()->user()->update($data);
                if($update)
                    $notification = array(
                        'message' => 'Senha atualizada com sucesso!',
                        'alert-type' => 'success'
                    );
            }else{
            unset($data['password']);
            $notification = array(
                        'message' => 'Senha não pôde ser atualizada!',
                        'alert-type' => 'warning'
                    );
            }
        }else{
            unset($data['password']);
            $notification = array(
                        'message' => 'Senha não pôde ser atualizada!',
                        'alert-type' => 'warning'
                    );
        }
        return view('home')->with($notification);
        
    }
    
    public function delete($id){
        
        $user = User::find($id);

       if($user){
           $user->roles()->detach();
           $user->delete();
           $notification = array(
                        'message' => 'Usuário deletado com sucesso!',
                        'alert-type' => 'success'
                    );
           return redirect('usuario/login')->with($notification);
       }
        $notification = array(
                        'message' => 'Usuário não pôde ser deletado!',
                        'alert-type' => 'warning'
                    );
        return redirect('usuario/login')->with($notification);
        
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

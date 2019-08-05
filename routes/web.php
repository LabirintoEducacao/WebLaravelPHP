<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* rotas de quando altera ou deleta*/




/* -----------------------------------------------*/

Route::get('/email', function () {
    return view('email.cadastro'); 
});

//Route::post('home', 'ProfileController@edit');

Route::post('home', 'ProfileController@reset_password');

 Route::post('profile/edit', 'ProfileController@edit');



Route::get('admin/settings', function () {
    return view('profile'); 
});

Route::get('admin/deletar', function () {
    return view('profile'); 
});

Route::delete('admin/settings/delete/{id}', 'Admin\UserController@destroy');

Route::delete('admin/delete/{id}', 'ProfileController@delete');

    
Route::get('admin/settings/create', function () {
    return view('admin.users.register'); 
});


Route::get('admin/settings/password', function () {
    return view('password'); 
});

Route::get('admin/sala', function () {

    $data = \App\Sala::all ();
    return view ( 'sala' )->withData ( $data );

});

Route::get('admin/alunos/{id}', 'Admin\UserController@add_user');
Route::post('admin/aluno', 'Admin\UserController@store');
Route::get('admin/deletar-aluno/{id}/{sala}', 'Admin\UserController@deletar');
// Route::get('admin/alunos/{id}', function () {

//     $data = \App\User::all ();
//     return view ('add_alunos')->withData ( $data );

// });


Route::get('admin/deletar-sala/{id}', 'SalaController@destroy' );



Route::get('admin/pergunta', function () {
    return view('questions');
});


Route::get('login/user', function () {
    return view('user.login');
});

Route::get('register/user', function () {
    return view('user.register');
});


Route::post('admin/editar-sala','SalaController@edit_sala');




Route::post('convite/novo/{email}','Admin\UserController@invite');



Route::get('/admin/newuser', function () {
    return view('admin.users.newuser');
});

Route::post('/admin/new/user', 'Admin\UserController@user');




/*  Rotas do Email */

Route::post('/admin/new/email', 'Admin\UserController@email');



/* Rotas Do Usuario */

Route::get('usuario/login', 'User\UserRegisterController@login')->name('userLogin');
Route::post('usuario/login', 'Auth\LoginController@login')->name('userLogin');
Route::get('usuario/register', 'User\UserRegisterController@showRegistrationForm')->name('userRegister');
Route::post('usuario/register', 'Auth\UserRegisterController@register')->name('userRegister');

Route::get('usuario/cadastro/{id}', function ($id) {
    return view ( 'cad_sala' )->with(['id'=>$id]);

});
Route::post('usuario/cadastro/{id}', 'Auth\UserRegisterController@createWithSala');


/* Rotas do Admin */

Route::get('/admin', function(){
   
    return view('home');

})->middleware(['auth', 'auth.admin']);


Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){

	Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);

});

/* Rotas da sala */


//Route::get('admin/adicionar-sala', 'SalaController@index');

//Route::post('admin/adicionar-sala/salvar', 'SalaController@store');

/*Rotas da pergunta*/

//Route::get('admin/editar-sala', 'PerguntaController@index');
//Route::post('admin/editar-sala/salvar', 'PerguntaController@store');

/*Rotas da resposta*/

//Route::get('admin/editar-sala', 'RespostaController@index');
//Route::post('admin/editar-sala/salvar', 'RespostaController@store');


Route::get('admin/adicionar-sala', 'SalaController@index');
Route::post('admin/sala', 'SalaController@store');

/*Rotas da pergunta e Resposta*/

Route::get('admin/editar-sala/{id}', 'PerguntaRespostaController@index');
Route::post('admin/editar-sala/{id}', 'PerguntaRespostaController@store');

Route::post('admin/editar-resp', 'PerguntaRespostaController@edit_resp');
Route::post('admin/editar-perg', 'PerguntaRespostaController@edit_perg');

Route::get('admin/deletar-pergunta/{id}', 'PerguntaRespostaController@destroy');
Route::get('admin/deletar-resposta/{id}', 'PerguntaRespostaController@destroyresp');

Route::post('admin/alterar-ordem','PerguntaRespostaController@alterar');

Route::get('admin/add-aluno', 'SalaController@add_user');


Route::get('virtual', 'SalaController@entrar');

Route::get('admin/virtual', 'SalaController@entrar');

Route::get('virtual', 'SalaController@entrar_guest');

Route::get('buscar', 'SalaController@buscar');

Route::post('buscar', 'SalaController@buscar');

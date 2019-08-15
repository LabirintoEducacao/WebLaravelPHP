<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/admin/sala','SalaController@indexJson');
Route::get('/login', 'Auth\LoginController@teste');
Route::Post('/virtual', 'SalaController@teste' );



// Route::get('/virtual', 'SalaController@teste');

// Route::post('/virtual', function(){

//         $id   = Input::get('id');

     
//   return redirect()->action('SalaController@teste', ['json' => $id]);

//  });




 








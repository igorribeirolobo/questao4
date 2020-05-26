<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('API')->name('api.')->group(function(){
   Route::prefix('/contatos')->group(function(){
       Route::get('/','ContatoController@index')->name('contatos');
       Route::get('/{id}','ContatoController@show')->name('show');
       Route::post('/create', 'ContatoController@store')->name('create');
       Route::put('/edit', 'ContatoController@update')->name('edit');
       Route::delete('/remove/{id}', 'ContatoController@remove')->name('remove');
   });
});

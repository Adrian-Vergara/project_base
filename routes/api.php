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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*
get => consultas
post => registros
put => actualizaciones
delete => eliminaciones
*/


Route::resource('expenses', 'ExpenseController');



/*Route::get('expenses', 'ExpenseController@index');
Route::get('expenses/{id}', 'ExpenseController@show');
Route::post('expenses', 'ExpenseController@store');
Route::put('expenses/{id}', 'ExpenseController@update');
Route::delete('expenses/{id}', 'ExpenseController@destroy');*/

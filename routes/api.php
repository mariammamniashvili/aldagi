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

Route::get('test', 'Test\TestController@Test');
Route::get('ebee/{id}', 'Test\TestController@Ebee');
Route::post('gela', 'Test\TestController@Gela');
Route::get('Registration', 'System\RegistrationController@system_registration');
Route::get('Login', 'System\LoginController@system_login');
Route::get('GetManufactors', 'Info\GetInfoController@manufactors');
Route::get('GetCarModels', 'Info\GetInfoController@models');
Route::get('GetMaxLimit', 'Finance\FinanceController@max_limit');
Route::get('Bonus', 'Finance\FinanceController@bonus');
Route::get('User', 'User\RegistartionController@user_registration');
Route::get('UserList', 'User\RegistartionController@users_list');
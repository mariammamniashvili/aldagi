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

<<<<<<< HEAD
Route::post('Company/Registration', 'System\RegistrationController@system_registration');
Route::post('Insurance/Register', 'User\RegistrationController@user_registration');
Route::post('Insurance/List', 'User\RegistrationController@users_list');
Route::post('Refund/Maximum', 'Finance\FinanceController@max_limit');
Route::get('Car/Categories', 'Info\CarsInfoController@manufactors');
Route::get('CarModels/{id}', 'Info\CarsInfoController@models');
Route::post('Login', 'System\LoginController@system_login');
Route::post('Price', 'Finance\FinanceController@bonus');
=======
Route::get('test', 'Test\TestController@Test');
Route::get('ebee/{id}', 'Test\TestController@Ebee');
Route::post('gela', 'Test\TestController@Gela');
Route::get('Registration', 'System\RegistrationController@system_registration');
Route::get('Login', 'System\LoginController@system_login');
Route::get('Manufactors', 'Info\CarsInfoController@manufactors');
Route::get('CarModels', 'Info\CarsInfoController@models');
Route::get('MaxLimits', 'Finance\FinanceController@max_limit');
Route::get('Bonus', 'Finance\FinanceController@bonus');
Route::get('Users', 'User\RegistartionController@user_registration');
Route::get('UsersList', 'User\RegistartionController@users_list');
>>>>>>> d33d45fa89fd018aeb7e673f3b3c5178a5a4cd4a

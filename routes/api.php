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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });
Route::post('add-user', 'RegisterController@RegisterNewUser');
Route::post('login-user', 'LoginController@login_user');
Route::post('get-user', 'LoginController@getUser');
Route::post('add-role', 'RoleController@add_role');
Route::post('add-order-cs','OrderController@add_new_order_customer_service');
Route::post('add-project','ProjectController@add_project');
Route::post('add-unit','UnitController@add_unit');
Route::post('add-service','ServiceController@add_service');
Route::post('get-services', 'ServiceController@get_services');
Route::post('get-projects', 'ProjectController@get_projects');
Route::post('get-units', 'UnitController@get_units');
Route::post('get-orders','OrderController@get_orders');
Route::post('get-order' , 'OrderController@get_order');
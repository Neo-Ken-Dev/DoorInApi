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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::apiResource('immeuble', 'ImmeubleController');
Route::apiResource('account', 'AccountController');

Route::get('user/immeubles', function (){
    return \App\Immeuble::with('owners')->get();
});

//Route::get('user/{id}/immeubles', function ($id = 6){
//    return $userImmeubles;
//
//    $test = DB::table('immeuble_user')
//        ->join('immeubles', 'immeuble_id', '=', 'immeubles.id')
//        ->join('users', 'users.id', '=', 'users.id')
//        ->get();
//    $id = 6;
//    $test = DB::table('users')
//        ->join('immeubles', 'users.id', '=', 'immeubles.id')
//        ->get();
//    $userID = 10;
//    $test = \App\User::Join('immeuble_user', function($join) use($userID){
//        $join->on('immeuble_id', '=', 'immeuble_user.immeuble_id')
//            ->where('immeuble_user.user_id','=', $userID);
//        })
//        ->get();
//    $users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();
//});


Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

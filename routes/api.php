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

// call back payment from third party, use ngrok as the forwarding server
Route::get('testAPI', function (){
   return response()->json(['data' => "Connected"]);
});
// Callback Payment from user
Route::post('callback-payment','API\CallBackController@callBackPayment');
// create account virtual
Route::post('callback-fva','API\CallBackController@callBackFVA');

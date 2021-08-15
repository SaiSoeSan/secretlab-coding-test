<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiModelController;

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

//API
Route::group(['prefix' => 'object'], function() {
    Route::get('/get_all_records', [ApiModelController::class, 'GetAllRecords']);
    Route::any('/{key?}', [ApiModelController::class, 'RecordActions']);
});


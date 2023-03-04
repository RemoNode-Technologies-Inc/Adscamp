<?php

use App\Http\Controllers\V1\AuthAPIController;
use App\Http\Controllers\V1\CampaignController;
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

Route::prefix('v1')->group(function(){
    Route::post('/users/login', [AuthAPIController::class,'login']);
    Route::post('/users/logout', [AuthAPIController::class, 'logout']);
    Route::post('/users/register', [AuthAPIController::class, 'register']);
    Route::apiResource('campaign', CampaignController::class )->only('store','index');
});

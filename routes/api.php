<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',[AuthController::class,'login'] );
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    Route::post('user/{id}', [AuthController::class,'user']);
    Route::post("signUp",[AuthController::class,"signUp"]);

});
Route::prefix('/announcement')->middleware(['auth'])->group(function () {
    Route::post('/create',[UserController::class,'createAnnouncements']);
    Route::post('/add',[UserController::class,'add']);
    Route::get('/allAnnouncements',[AnnouncementsController::class,'all']);
    Route::get('/delete/{id}',[AnnouncementsController::class,'delete']);
});


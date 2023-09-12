<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\GramPanchyatController;
use App\Http\Controllers\Api\RespondentMasterController;
use App\Http\Controllers\Api\VillageController;
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
Route::post('login',[AuthController::class,'login'])->name('login');;
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('respondent-master', RespondentMasterController::class);
    Route::post('respondent-master/store', [RespondentMasterController::class,'store']);
    Route::resource('block', BlockController::class);
    Route::resource('village', VillageController::class);
    Route::resource('district', DistrictController::class);
    Route::resource('gram-panchyat', GramPanchyatController::class);
    // Route::post('logout',[AuthController::class,'logout'])->name('logout');;
});

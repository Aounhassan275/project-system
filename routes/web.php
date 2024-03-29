<?php

use App\Helpers\PaymentGateway;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/******************LOGIN PAGE ROUTES START****************/
Route::view('/','auth.login');
Route::view('login','auth.login');
Route::post('login',[AuthController::class,'login'])->name('login');
/******************LOGIN PAGE ROUTES END****************/

/*******************REGISTER ROUTE START*************/      
Route::view('register','auth.register');
Route::post('register',[AuthController::class,'register'])->name('register');
/*******************REGISTER ROUTE END*************/     

/*******************LOGOUT ROUTE START*************/       
Route::get('logout',[AuthController::class,'logout'])->name('logout');
/*******************LOGOUT ROUTE END*************/     
Route::post('get_city_against_states',[AuthController::class,'getCityAgainstStates'])->name('get_city_against_states');
Route::post('get_state_against_countries',[AuthController::class,'getStateAgainstCountries'])->name('get_state_against_countries');


/*******************ADMIN ROUTE START*************/       
include __DIR__ . '/admin.php';
/*******************ADMIN ROUTE END*************/     

/*******************PROJECT ROUTE START*************/       
include __DIR__ . '/project.php';
/*******************PROJECT ROUTE END*************/     

/*******************FIELD STAFF ROUTE START*************/       
include __DIR__ . '/field_staff.php';
/*******************FIELD STAFF ROUTE END*************/     

/*******************CRP ROUTE START*************/       
include __DIR__ . '/crp.php';
/*******************CRP ROUTE END*************/    
 
/*******************EXECUTIVE ROUTE START*************/       
include __DIR__ . '/executive.php';
/*******************EXECUTIVE ROUTE END*************/     
     
/******************FUNCTIONALITY ROUTES****************/
Route::get('cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
  });
  Route::get('migrate', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate');
    Artisan::call('view:clear');
    return 'DONE';
  });
  Route::get('cache_clear', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return 'DONE';
  });
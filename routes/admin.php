<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\PoliceStationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectUserController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin', 'as'=>'admin.','middleware' => 'auth:user','admin'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','admin.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/       
    /*******************USER ROUTE START*************/       
    Route::get('user/verified/{id}',[UserController::class,'verified'])->name('user.verified');
    Route::get('user/revert_verification/{id}',[UserController::class,'revert_verification'])->name('user.revert_verification');
    Route::get('user/active/{id}',[UserController::class,'active'])->name('user.active');
    Route::get('user/in_active/{id}',[UserController::class,'in_active'])->name('user.in_active');
    Route::resource('user',UserController::class);
    /*******************USER ROUTE END*************/          
    /*******************COUNTRY ROUTE START*************/       
    Route::resource('country',CountryController::class);
    /*******************COUNTRY ROUTE END*************/            
    /*******************STATE ROUTE START*************/       
    Route::resource('state',StateController::class);
    /*******************STATE ROUTE END*************/               
    /*******************CITY ROUTE START*************/       
    Route::resource('city',CityController::class);
    /*******************CITY ROUTE END*************/
    /*******************POLICE STATION ROUTE START*************/       
    Route::resource('police_station',PoliceStationController::class);
    /*******************POLICE STATION  ROUTE END*************/  
    /*******************District ROUTE START*************/       
    Route::resource('district',DistrictController::class);
    /*******************District ROUTE END*************/     
    /*******************Project ROUTE START*************/       
    Route::resource('project',ProjectController::class);
    /*******************Project ROUTE END*************/        
    /*******************Project User ROUTE START*************/       
    Route::resource('project_user',ProjectUserController::class);
    /*******************Project ROUTE END*************/   
});
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
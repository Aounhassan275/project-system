<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\UserController;

Route::group(['prefix' => 'project', 'as'=>'project.','middleware' => 'auth:user'], function () { 
    Route::group(['middleware' => 'project'], function () { 
        /*******************DASHBOARD ROUTE START*************/       
        Route::view('dashboard','project.dashboard.index')->name('dashboard.index');
        /*******************DASHBOARD ROUTE END*************/       
        /*******************Project ROUTE START*************/       
        Route::resource('project',ProjectController::class);
        /*******************Project ROUTE END*************/  
        /*******************USER ROUTE START*************/     
        Route::resource('user',UserController::class);
        /*******************USER ROUTE END*************/  
    });        
});        
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Project\DashboardController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\UserController;

Route::group(['prefix' => 'project', 'as'=>'project.','middleware' => 'auth:user'], function () { 
    Route::group(['middleware' => 'project'], function () { 
        /*******************DASHBOARD ROUTE START*************/       
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
        Route::get('project_dashboard',[DashboardController::class,'index'])->name('project_dashboard.index');
        /*******************DASHBOARD ROUTE END*************/       
        /*******************Project ROUTE START*************/       
        Route::resource('project',ProjectController::class);
        /*******************Project ROUTE END*************/  
        /*******************USER ROUTE START*************/ 
        Route::get('user/verified/{id}',[UserController::class,'verified'])->name('user.verified');
        Route::get('user/revert_verification/{id}',[UserController::class,'revert_verification'])->name('user.revert_verification');
        Route::get('user/active/{id}',[UserController::class,'active'])->name('user.active');
        Route::get('user/in_active/{id}',[UserController::class,'in_active'])->name('user.in_active');    
        Route::resource('user',UserController::class);
        /*******************USER ROUTE END*************/  
    });        
});        
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
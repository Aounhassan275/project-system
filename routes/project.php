<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Project\DashboardController;
use App\Http\Controllers\Project\ProjectDashboardController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ReportController;
use App\Http\Controllers\Project\UserController;

Route::group(['prefix' => 'project', 'as'=>'project.','middleware' => 'auth:user'], function () { 
    Route::group(['middleware' => 'project'], function () { 
        /*******************DASHBOARD ROUTE START*************/       
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
        Route::get('project_dashboard',[ProjectDashboardController::class,'index'])->name('project_dashboard.index');
        /*******************DASHBOARD ROUTE END*************/       
        /*******************Project ROUTE START*************/       
        Route::resource('project',ProjectController::class);
        /*******************Project ROUTE END*************/  
        /*******************USER ROUTE START*************/ 
        Route::get('user/verified/{id}',[UserController::class,'verified'])->name('user.verified');
        Route::get('user/revert_verification/{id}',[UserController::class,'revert_verification'])->name('user.revert_verification');
        Route::get('user/active/{id}',[UserController::class,'active'])->name('user.active');
        Route::get('user/in_active/{id}',[UserController::class,'in_active'])->name('user.in_active');
        Route::post('get_districts',[UserController::class,'getDistricts'])->name('user.get_districts');
        Route::post('get_blocks',[UserController::class,'getBlocks'])->name('user.get_blocks');
        Route::post('get_gram_panchyats',[UserController::class,'getGramPanchyats'])->name('user.get_gram_panchyats');
        Route::post('get_villages',[UserController::class,'getVillages'])->name('user.get_villages');    
        Route::resource('user',UserController::class);
        /*******************USER ROUTE END*************/       
        Route::get('report/monthly-progress',[ReportController::class,'monthlyProgress'])->name('report.monthly-progress');
        Route::get('report/monthly-training',[ReportController::class,'monthlyTraining'])->name('report.monthly-training');
        Route::get('report/basic-farmer-profile',[ReportController::class,'basicFarmerProfile'])->name('report.basic-farmer-profile');
    });        
});        
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
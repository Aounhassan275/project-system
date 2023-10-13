<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\FieldStaff\FarmingProfileController;
use App\Http\Controllers\FieldStaff\MonthlyFarmingReportController;
use App\Http\Controllers\FieldStaff\RespondentMasterController;
use App\Http\Controllers\FieldStaff\TrainingReportController;

Route::group(['prefix' => 'field_staff', 'as'=>'field_staff.','middleware' => 'auth:user','field_staff'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','field_staff.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/       
    /*******************TRAINING REPORT ROUTE START*************/       
    Route::resource('training_report',TrainingReportController::class);
    /*******************TRAINING REPORT ROUTE END*************/   
    /*******************Respondent Master ROUTE START*************/       
    Route::resource('respondent_master',RespondentMasterController::class);
    /*******************Respondent Master ROUTE END*************/   
    /*******************Farming Profile ROUTE START*************/       
    Route::resource('farming_profile',FarmingProfileController::class);
    /*******************Farming Profile ROUTE END*************/  
    /*******************Monthly Farming Report ROUTE START*************/       
    Route::post('get_months',[MonthlyFarmingReportController::class,'getMonths'])->name('monthly_farming_report.getMonths');
    Route::resource('monthly_farming_report',MonthlyFarmingReportController::class);
    /*******************Monthly Farming Report ROUTE END*************/    
});        
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
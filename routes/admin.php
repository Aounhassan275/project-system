<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\FarmingProfileController;
use App\Http\Controllers\Admin\GramPanchyatController;
use App\Http\Controllers\Admin\MajorDeliveryController;
use App\Http\Controllers\Admin\MonthlyFarmingReportController;
use App\Http\Controllers\Admin\PoliceStationController;
use App\Http\Controllers\Admin\PondPreparationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectUserController;
use App\Http\Controllers\Admin\RespondentMasterController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\TrainingReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VillageController;

Route::group(['prefix' => 'admin', 'as'=>'admin.','middleware' => 'auth:user','admin'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','admin.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/       
    /*******************USER ROUTE START*************/       
    Route::view('user/project_manager','admin.user.project_manager')->name('user.project_manager');
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
    /*******************Block ROUTE START*************/       
    Route::resource('block',BlockController::class);
    /*******************Block ROUTE END*************/    
    /*******************Gram Panchyat ROUTE START*************/       
    Route::resource('gram_panchyat',GramPanchyatController::class);
    /*******************Gram Panchyat ROUTE END*************/     
    /*******************Village ROUTE START*************/       
    Route::resource('village',VillageController::class);
    /*******************Village ROUTE END*************/        
    /*******************Project ROUTE START*************/       
    Route::resource('project',ProjectController::class);
    /*******************Project ROUTE END*************/        
    /*******************Project User ROUTE START*************/       
    Route::resource('project_user',ProjectUserController::class);
    /*******************Project User ROUTE END*************/      
    /*******************Major Delivery ROUTE START*************/       
    Route::resource('major_delivery',MajorDeliveryController::class);
    /*******************Major Delivery ROUTE END*************/      
    /*******************Respondent Master ROUTE START*************/       
    Route::resource('respondent_master',RespondentMasterController::class);
    /*******************Respondent Master ROUTE END*************/   
    /*******************Farming Profile ROUTE START*************/       
    Route::resource('farming_profile',FarmingProfileController::class);
    /*******************Farming Profile ROUTE END*************/   
    /*******************Pond Preparation ROUTE START*************/       
    Route::resource('pond_preparation',PondPreparationController::class);
    /*******************Pond Preparation ROUTE END*************/   
    /*******************Monthly Farming Report ROUTE START*************/       
    Route::post('get_months',[MonthlyFarmingReportController::class,'getMonths'])->name('monthly_farming_report.getMonths');
    Route::resource('monthly_farming_report',MonthlyFarmingReportController::class);
    /*******************Monthly Farming Report ROUTE END*************/   
    /*******************TRAINING REPORT ROUTE START*************/       
    Route::resource('training_report',TrainingReportController::class);
    /*******************TRAINING REPORT ROUTE END*************/   
});
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
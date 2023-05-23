<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/


Route::group(['prefix' => 'project', 'as'=>'project.','middleware' => 'auth:user','project'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','project.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/       });
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
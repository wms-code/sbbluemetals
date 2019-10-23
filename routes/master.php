<?php
Route::get('/colours', "ColoursController@index");
 //Route::resource('/colours', 'ColoursController');
Route::group(['namespace' => 'Admin'], function() {
   
    Route::resource('/colour', 'ColoursController');
    //Route::resource('/company', 'CompanyController');

   
     
 
});





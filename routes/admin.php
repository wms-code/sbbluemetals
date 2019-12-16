<?php

Route::group(['namespace' => 'Admin'], function() {
    Route::GET('/home', 'AdminController@index')->name('admin.home');

    // Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');
    //Route::resource('company', 'CompanyController');

    //Master
    Route::group(['namespace' => 'Settings'], function() {
        Route::resource('accounts', 'AccountsController');
        Route::put('accounts', 'AccountsController@update');
        Route::resource('colour', 'ColourController');
        Route::resource('fabric', 'FabricController');
        Route::resource('count', 'CountController');
        Route::resource('unit', 'UnitController');
        Route::resource('stockpoint', 'StockpointController');
        Route::resource('style', 'StyleController');
        Route::post('size/fetchtable', 'SizeController@fetchtable')->name('size.fetchtable');
        Route::resource('accessories', 'AccessoriesController');
        Route::resource('companies', 'CompanyController');
        Route::resource('size', 'SizeController');
   
        Route::resource('knittedfabric', 'KnittedFabInwardController');
        Route::put('knittedfabric', 'KnittedFabInwardController@update');
        
       
        Route::resource('fabricstock', 'FabricstockController');  
        Route::resource('fabricgroup', 'FabricGroupController');
        
        Route::resource('cuttingproduction', 'CuttingProductionController');
        Route::post('cuttingproduction/fetchsize', 'CuttingProductionController@fetchsize')->name('cuttingproduction.fetchsize');
        Route::post('cuttingproduction/fetchfrn', 'CuttingProductionController@fetchfrn')->name('cuttingproduction.fetchfrn');
        Route::post('cuttingproduction/fetchcolourfabric', 'CuttingProductionController@fetchcolourfabric')->name('cuttingproduction.fetchcolourfabric');
        Route::put('cuttingproduction', 'CuttingProductionController@update');
        Route::post('cuttingproduction/saveproduction', 'CuttingProductionController@saveproduction')->name('cuttingproduction.saveproduction');
        Route::post('cuttingproduction/fetchproduction', 'CuttingProductionController@fetchproduction')->name('cuttingproduction.fetchproduction');
        

        Route::post('knittedfabric/fetchfabric', 'KnittedFabInwardController@fetchfabric')->name('knittedfabric.fetchfabric');
        Route::post('knittedfabric/fetchcolour', 'KnittedFabInwardController@fetchcolour')->name('knittedfabric.fetchcolour');
        Route::post('knittedfabric/fetchrack', 'KnittedFabInwardController@fetchrack')->name('knittedfabric.fetchrack');
        Route::post('knittedfabric/fetchfrn', 'KnittedFabInwardController@fetchfrn')->name('knittedfabric.fetchfrn');
        Route::post('knittedfabric/savefrn', 'KnittedFabInwardController@savefrn')->name('knittedfabric.savefrn');
         
    });

 

   
    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');

    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach')->middleware('role:super');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete')->middleware('role:super');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');
    Route::get('/{any}', function () {
        return abort(404);
    });
});





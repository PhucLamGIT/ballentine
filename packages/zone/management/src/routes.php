<?php
Route::group(['middleware' => 'web', 'namespace' => 'Zone\Management\Controllers'], function () {
    Route::get('/dashboard','DashboardController@index')->name('management.dashboard.index');

    Route::group(['prefix' => 'management'], function (){
        Route::get('/role', 'RoleController@index')->name('management.role.list');
        Route::get('/role/create', 'RoleController@create')->name('management.role.create');
        Route::post('/role/insert', 'RoleController@insert')->name('management.role.insert');
        Route::get('/role/{id}/edit', 'RoleController@edit')->name('management.role.edit');
        Route::put('/role/{id}/update', 'RoleController@update')->name('management.role.update');
    
        Route::get('/user','UserController@index')->name('management.user.list');
        Route::get('/user/create', 'UserController@create')->name('management.user.create');
        Route::post('/user/insert', 'UserController@insert')->name('management.user.insert');
        Route::get('/user/{id}/edit', 'UserController@edit')->name('management.user.edit');
        Route::put('/user/{id}/update', 'UserController@update')->name('management.user.update');

        Route::get('/customer','CustomerController@index')->name('management.customer.list');
        Route::get('/customer/create', 'CustomerController@create')->name('management.customer.create');
        Route::post('/customer/insert', 'CustomerController@insert')->name('management.customer.insert');
        Route::get('/customer/{id}/edit', 'CustomerController@edit')->name('management.customer.edit');
        Route::put('/customer/{id}/update', 'CustomerController@update')->name('management.customer.update');

        Route::get('/pg','PgController@index')->name('management.pg.list');
        Route::get('/pg/create', 'PgController@create')->name('management.pg.create');
        Route::post('/pg/insert', 'PgController@insert')->name('management.pg.insert');
    });
   
});
<?php

Route::group(['middleware' => ['web', 'activity']], function () {
    Route::get('/','LandingController@index');
    //Route::resource('home','HomeController@index');
    Route::resource('availability','AvailabilityController');
    Route::patch('appointment-create','AvailabilityController@update');
    Route::patch('appointment-create/{id}','AvailabilityController@update');

    Route::get('home/{id}','HomeController@show');
    Route::get('home','HomeController@index');
    Route::get('events', 'EventsController@index');
    Route::get('statistics', 'StatisticsController@index');
    Route::get('contacts', 'ContactsController@index');


    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('appointments', 'Admin\AppointmentsController');
    });
// Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
    $this->post('login', 'Auth\LoginController@login')->name('auth.login');
    $this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
    $this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
    $this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

    Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/home', 'HomeController@index');

        Route::resource('events', 'EventsController',
                [
                        'only' => ['edit','update','create','store']
                ]
        );
        Route::resource('statistics', 'StatisticsController',
                [
                        'only' => ['edit','update','create','store']
                ]);
        Route::resource('contacts', 'ContactsController',
                [
                        'only' => ['edit','update','create','store']
                ]);
        Route::resource('home', 'HomeController',
                [
                        'only' => ['edit','update','create','store']
                ]);
        Route::resource('roles', 'Admin\RolesController');
        Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
        Route::resource('users', 'Admin\UsersController');
        Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
        Route::resource('clients', 'Admin\ClientsController');
        Route::post('clients_mass_destroy', ['uses' => 'Admin\ClientsController@massDestroy', 'as' => 'clients.mass_destroy']);
        Route::get('get-employees', 'Admin\EmployeesController@GetEmployees');
        Route::resource('employees', 'Admin\EmployeesController');
        Route::post('employees_mass_destroy', ['uses' => 'Admin\EmployeesController@massDestroy', 'as' => 'employees.mass_destroy']);
        Route::resource('working_hours', 'Admin\WorkingHoursController');
        Route::post('working_hours_mass_destroy', ['uses' => 'Admin\WorkingHoursController@massDestroy', 'as' => 'working_hours.mass_destroy']);
        //Route::resource('appointments', 'Admin\AppointmentsController');
        Route::post('appointments_mass_destroy', ['uses' => 'Admin\AppointmentsController@massDestroy', 'as' => 'appointments.mass_destroy']);
        Route::resource('services', 'Admin\ServicesController');
        Route::post('services_mass_destroy', ['uses' => 'Admin\ServicesController@massDestroy', 'as' => 'services.mass_destroy']);

    });
});

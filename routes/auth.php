<?php



Route::group(['namespace' => 'App\Http\Controllers\Api\Auth\User'], function () {
    Route::post('login/client',    'LoginController@login');
});

Route::group(['namespace' => 'App\Http\Controllers\Api\Auth\Merchant'], function () {
    Route::post('login/merchant',    'LoginController@login');
});


Route::group(['namespace' => 'App\Http\Controllers\Api\Auth'], function () {

    Route::post('register/client', 'RegisterController@clientRegister');
    Route::post('register/merchant', 'RegisterController@merchantRegister');

    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify'); // Make sure to keep this as your route name


    Route::group(['middleware' => 'auth:api'], function () {

        Route::post('logout', 'BaseLoginController@logout');

    });


});

<?php



Route::group(['namespace' => 'App\Http\Controllers\Api\Auth\User'], function () {
    Route::post('user/login',    'LoginController@login');
});

Route::group(['namespace' => 'App\Http\Controllers\Api\Auth\Merchant'], function () {
    Route::post('merchant/login',    'LoginController@login');
});


Route::group(['namespace' => 'App\Http\Controllers\Api\Auth'], function () {

    Route::post('register', 'RegisterController@register');

    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify'); // Make sure to keep this as your route name

    Route::post('/forgot-password', 'ResetPasswordController@sendResetPasswordMail')->middleware('guest')->name('password.email');

    Route::post('/reset-password', 'ResetPasswordController@resetPassword')->middleware('guest')->name('password.update');

    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');

        Route::post('logout', 'LoginController@logout');

    });

    Route::post('/change-password', 'ChangePasswordController@changePassword')->middleware('auth:api')->name('password.change');


});

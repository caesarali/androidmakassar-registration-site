<?php

Route::get('mailable', function () {
    $notifiable = App\Models\User::where('email', 'cesartkj@gmail.com')->first();
    $notifiable->load('participant');

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify', now()->addMinutes(60), ['id' => $notifiable->getKey()]
    );

    $password = Str::random(10);

    return new App\Mail\EmailVerification($verificationUrl, $notifiable, $password);
});

Route::get('/', 'Auth\RegisterController@showRegistrationForm')->middleware('guest');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'middleware' => ['role:admin|superadmin']], function () {
    Route::resource('courses', 'EventController');
    Route::resource('registrations', 'RegistrationController')->only(['update', 'destroy']);
    Route::resource('users', 'UserController');
    Route::resource('members', 'MemberController');
});

Route::group(['namespace' => 'Member', 'middleware' => ['role:member']], function () {
    Route::get('/registrations/{code}/receipt', 'RegistrationController@showReceiptForm')->name('receipt.form');
    Route::post('/registrations/{code}/receipt', 'RegistrationController@receipt')->name('receipt.save');
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');
});
